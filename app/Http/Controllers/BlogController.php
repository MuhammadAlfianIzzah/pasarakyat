<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use DOMDocument;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function show()
    {
        $posts = Post::get();
        return view("page.blog.show", compact("posts"));
    }
    public function detail(Request $request, Post $posts)
    {
        return view("page.blog.detail", compact("posts"));
    }
    public function create()
    {
        return view("page.blog.create");
    }
    public function store(Request $request)
    {
        $attr =   $request->validate([
            "title" => "required|min:8",
            "tanggal_post" => "required",
            "body" => "required",
            "thumbnail" => "required|mimes:png,jpg,jpeg",
        ]);
        $body = $attr["body"];

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($body, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');

            if ((strpos("$data", 'data:image/png;base64') !== false) || (strpos("$data", 'data:image/jpeg;base64') !== false) || strpos("$data", 'data:image/gif;base64') !== false) {
                // dd("base 64");
                list($type, $data) = explode(';', $data);

                list($type, $data) = explode(',', $data);

                $data = base64_decode($data);

                $path = "/posts/img-post/" . time() . $k . '.png';

                Storage::put($path, $data);
                $img->removeAttribute('src');

                $img->setAttribute('src', "/storage" .  $path);
            }
        }
        $slug = Str::slug($request->title, '-');

        $body = $dom->saveHTML();
        $attr["slug"] = $slug;
        $attr["body"] = $body;
        // $attr["thumbnail"] =  $request->file("thumbnail")->store("posts/thumbnail");
        $file_name = time() . "_" .   $request->file("thumbnail")->getClientOriginalName();
        $photo =   Image::make($request->file("thumbnail"))
            ->resize(1270, null, function (
                $constraint
            ) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 80);
        Storage::disk('public')->put('posts/thumbnail/' . $file_name, $photo);
        $attr["thumbnail"] = "posts/thumbnail/" . $file_name;
        try {
            Post::create($attr);
            return redirect()->route("myblog")->with("success", "berhasil menambah Posts");
        } catch (QueryException $e) {
            // dd($e);
            return back()->route("myblog")->with("error", "Ups, maaf terjadi kesalahan, silahkan coba lagi, atau silahkan laporkan bug ini di halaman lapor");
        }
    }
    public function myblog()
    {
        $posts = Post::get();
        return view("page.blog.myblog", compact("posts"));
    }
    public function delete(Post $posts)
    {


        if (Storage::exists($posts->thumbnail)) {
            Storage::delete($posts->thumbnail);
        }
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);

        $doc->loadHTML($posts->body);

        $tags = $doc->getElementsByTagName('img');

        foreach ($tags as $tag) {
            $tg = $tag->getAttribute('src');
            File::delete(public_path() . $tg);
        }
        try {
            $posts->delete();
            request()->session()->flash("success", "berhasil menghapus post");
        } catch (\Throwable $e) {
            // dd($e);
            request()->session()->flash("error", "Ups sepertinya terjadi sesuatu");
        }
        return back();
        abort(404);
    }
    public function edit(Request $request, Post $posts)
    {
        return view("page.blog.edit", compact("posts"));
    }
    public function update(Request $request, Post $posts)
    {
        $old = [];
        $new = [];

        // validation
        $attr = $request->validate([
            "title" => "required",
            "body" => "required|min:0",
            "thumbnail" => "mimes:png,jpg,jpeg",
        ]);
        // end validation

        // handle thumbnail
        if (request()->file("thumbnail")) {
            Storage::delete($posts->thumbnail);
            // $attr["thumbnail"] =  $request->file("thumbnail")->store("posts/thumbnail");
            $file_name = time() . "_" .   $request->file("thumbnail")->getClientOriginalName();
            $photo =   Image::make($request->file("thumbnail"))
                ->resize(1270, null, function (
                    $constraint
                ) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg', 80);
            Storage::disk('public')->put('posts/thumbnail/' . $file_name, $photo);
            $attr["thumbnail"] = "posts/thumbnail/" . $file_name;
        }
        // end handle thumbnail

        $body = $attr["body"];

        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($body, 'HTML-ENTITIES', 'UTF-8'));
        $images = $dom->getElementsByTagName('img');
        // if empty img
        if ($images->length == 0) {
            $doc = new DOMDocument();
            $doc->loadHTML($posts->body);

            $tags = $doc->getElementsByTagName('img');

            foreach ($tags as $tag) {
                $tg = $tag->getAttribute('src');
                File::delete(public_path() . $tg);
            }
        }
        // if empty img

        // dd($images);
        $doc = new DOMDocument();
        $doc->loadHTML($posts->body);

        $tags = $doc->getElementsByTagName('img');

        foreach ($tags as $tag) {
            $tg = $tag->getAttribute('src');
            $old[] = $tg;
        }
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');

            if ((strpos("$data", 'data:image/png;base64') !== false) || (strpos("$data", 'data:image/jpeg;base64') !== false) || strpos("$data", 'data:image/gif;base64') !== false) {
                // dd("base 64");
                list($type, $data) = explode(';', $data);

                list($type, $data) = explode(',', $data);

                $data = base64_decode($data);

                $image_name = "/posts/img-post/" . time() . $k . '.png';

                $path = $image_name;
                Storage::put($path, $data);
                $img->removeAttribute('src');

                $img->setAttribute('src', "/storage" . $image_name);
            } else {
                $new[] =  $data;
            }
        }
        if (!empty(array_diff($old, $new))) {
            $diff = array_diff($old, $new);
            foreach ($diff as $path) {
                File::delete(public_path() . $path);
            }
        }

        $attr["slug"] = Str::slug($request->title, '-');

        $attr["body"] = $dom->saveHTML();
        try {
            $posts->update($attr);
        } catch (QueryException $e) {

            return redirect()->route("myblog")->with("error", "Ups, maaf terjadi kesalahan");
        }
        return redirect()->route("myblog")->with("success", "Berhasil Update");
    }
}
