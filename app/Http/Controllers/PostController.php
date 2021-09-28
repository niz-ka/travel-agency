<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("posts.index", [
            "posts" => Post::latest()->paginate(5),
            "categories" => Category::select("name", "id")->get(),
            "latest" => Post::select("title", "slug")
                ->latest()
                ->take(5)
                ->get(),
        ]);
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
            "categories" => Category::select("name", "id")->get(),
            "postsWithCategory" => Post::select("title", "slug")
                ->where("category_id", $post->category_id)
                ->get(),
        ]);
    }
}
