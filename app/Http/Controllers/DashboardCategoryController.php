<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.categories.index", [
            "categories" => Category::withCount("posts")->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:categories|max:50",
        ]);

        Category::create([
            "name" => request()->name,
            "slug" => Str::slug(request()->name),
        ]);

        return redirect(route("dashboard.categories.index"))->with(
            "status",
            "Pomyślnie dodano kategorię"
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("dashboard.categories.edit", [
            "category" => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => [
                "required",
                Rule::unique("categories")->ignore($category->id),
                "max:50",
            ],
        ]);

        Category::where("id", $category->id)->update([
            "name" => request()->name,
            "slug" => Str::slug($request->name),
        ]);

        return redirect(route("dashboard.categories.index"))->with(
            "status",
            "Pomyślnie edytowano kategorię"
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route("dashboard.categories.index"))->with(
            "status",
            "Pomyślnie usunięto kategorię"
        );
    }
}
