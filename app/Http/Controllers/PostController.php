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
            "posts" => Post::latest()
                ->with(["author:id,name", "category:id,name,slug"])
                ->paginate(5),
            "categories" => Category::select("name", "id", "slug")->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.show", [
            "post" => $post,
            "categories" => Category::select("name", "id", "slug")->get(),
            "postsWithCategory" => Post::select("title", "slug")
                ->where("category_id", $post->category_id)
                ->get(),
        ]);
    }
}
