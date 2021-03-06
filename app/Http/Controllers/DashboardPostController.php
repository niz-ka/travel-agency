<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request;
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchPhrase = $request->search;

        return view("dashboard.posts.index", [
            "posts" => Post::where("user_id", auth()->user()->id)
                ->when($searchPhrase, function ($query, $searchPhrase) {
                    return $query->search($searchPhrase);
                })
                ->with(["category:name,id"])
                ->latest()
                ->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.posts.create", [
            "categories" => Category::select("name", "id")->get(),
        ]);
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
            "category" => ["nullable", "exists:categories,id"],
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
            "category_id" => $request->category,
        ]);

        return redirect(route("dashboard.posts.index"))->with(
            "status",
            "Pomy??lnie dodano wpis"
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("dashboard.posts.edit", [
            "post" => $post,
            "categories" => Category::select("name", "id")->get(),
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
            "category" => ["nullable", "exists:categories,id"],
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
            "category_id" => $request->category,
        ]);

        return redirect(route("dashboard.posts.index"))->with(
            "status",
            "Pomy??lnie edytowano wpis"
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

        return redirect(route("dashboard.posts.index"))->with(
            "status",
            "Pomy??lnie usuni??to wpis"
        );
    }
}
