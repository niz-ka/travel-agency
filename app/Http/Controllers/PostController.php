<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchPhrase = $request->search;

        return view("posts.index", [
            "posts" => Post::latest()
                ->when($searchPhrase, function ($query, $searchPhrase) {
                    return $query->search($searchPhrase);
                })
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
