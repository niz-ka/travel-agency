<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth")->except("show");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|unique:posts|max:290",
            "content" => "required",
            "image" => "image|max:1999",
        ]);

        $path = $request->hasFile("image")
            ? $request->file("image")->store("images", "public")
            : Post::DEFAULT_IMAGE_PATH;

        Post::create([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "content" => $request->content,
            "image" => $path,
            "user_id" => $request->user()->id,
        ]);

        return redirect(route("dashboard"))->with(
            "status",
            "Pomyślnie dodano wpis"
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.show", [
            "post" => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.edit", [
            "post" => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (!Gate::allows("post-owner", $post)) {
            abort(403);
        }

        $request->validate([
            "title" => [
                "required",
                Rule::unique("posts")->ignore($post->id),
                "max:290",
            ],
            "content" => ["required"],
            "image" => ["image", "max:1999"],
        ]);

        if ($request->hasFile("image")) {
            $path = $request->file("image")->store("images", "public");
            // Delete previous non-default image
            if ($post->image !== Post::DEFAULT_IMAGE_PATH) {
                Storage::disk("public")->delete($post->image);
            }
        } else {
            $path = $post->image;
        }

        Post::where("id", $post->id)->update([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "content" => $request->content,
            "image" => $path,
            "user_id" => $request->user()->id,
        ]);

        return redirect(route("dashboard"))->with(
            "status",
            "Pomyślnie edytowano wpis"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (!Gate::allows("post-owner", $post)) {
            abort(403);
        }

        // Delete previous non-default image
        if ($post->image !== Post::DEFAULT_IMAGE_PATH) {
            Storage::disk("public")->delete($post->image);
        }

        $post->delete();

        return redirect(route("dashboard"))->with(
            "status",
            "Pomyślnie usunięto wpis"
        );
    }
}
