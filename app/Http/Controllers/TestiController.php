<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class TestiController extends Controller
{
    public function show()
    {
        $testimoni = Testimoni::get();
        return view("page.testimoni.show", compact("testimoni"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "nama" => "required|min:3",
            "job" => "required",
            "comment" => "required|min:8",
            "picture" => "required|mimes:png,jpg,jpeg"
        ]);
        $file_name = time() . "_" .   $request->file("picture")->getClientOriginalName();
        $photo =   Image::make($request->file("picture"))
            ->resize(1270, null, function (
                $constraint
            ) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 80);
        Storage::disk('public')->put('testimoni/' . $file_name, $photo);
        $attr["picture"] = "testimoni/" . $file_name;
        try {
            Testimoni::create($attr);
            return back()->with("success", "Berhasil Menambahkan");
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return back()->with("error", "Gagal Menambahkan");
        }
    }
    public function destroy(Request $request, Testimoni $testimoni)
    {
        if (Storage::exists($testimoni->picture)) {
            Storage::delete($testimoni->picture);
        }

        try {
            $testimoni->delete();
            return back()->with("success", "Berhasil Menghapus");
        } catch (\Throwable $th) {
            return back()->with("error", "Gagal Menghapus");
        }
    }
}
