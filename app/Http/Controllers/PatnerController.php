<?php

namespace App\Http\Controllers;

use App\Models\Patners;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatnerController extends Controller
{
    public function show()
    {
        $patners = Patners::get();
        return view("page.patners.show", compact("patners"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "nama" => "required|min:3",
            "deskripsi" => "required",
            "picture" => "required|mimes:png,jpg,jpeg"
        ]);
        $file_name = time() . "_" .   $request->file("picture")->getClientOriginalName();
        $photo =   \Image::make($request->file("picture"))
            ->resize(1270, null, function (
                $constraint
            ) {
                $constraint->aspectRatio();
            })
            ->encode('png', 80);
        Storage::disk('public')->put('patners/' . $file_name, $photo);
        $attr["picture"] = "patners/" . $file_name;
        try {
            Patners::create($attr);
            return back()->with("success", "Berhasil Menambahkan");
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with("error", "Gagal Menambahkan");
        }
    }
    public function destroy(Request $request, Patners $patners)
    {
        if (Storage::exists($patners->picture)) {
            Storage::delete($patners->picture);
        }

        try {
            $patners->delete();
            return back()->with("success", "Berhasil Menghapus");
        } catch (\Throwable $th) {
            return back()->with("error", "Gagal Menghapus");
        }
    }
}
