<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("categories.show", [
            "posts" => Post::where("category_id", $category->id)
                ->with(["author:id,name", "category:id,name,slug"])
                ->latest()
                ->paginate(5),
            "categories" => Category::select("name", "id", "slug")->get(),
            "latest" => Post::select("title", "slug")
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
