<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Index page
Route::get("/", function () {
    return view("main.index", [
        "posts" => Post::limit(3)
            ->latest()
            ->get(),
    ]);
})->name("index");

// Index page - send contact form as an email
Route::post("/", ContactFormController::class)->name("contactForm");

// Showing posts for unauthenticated users
Route::resource("posty", PostController::class)
    ->only(["index", "show"])
    ->names([
        "index" => "posts.index",
        "show" => "posts.show",
    ])
    ->parameters([
        "posty" => "post",
    ]);

// Posts management in dashboard area for authenticated users
Route::prefix("panel")->group(function () {
    Route::resource("posty", DashboardPostController::class)
        ->except(["show"])
        ->names([
            "index" => "dashboard.posts.index",
            "create" => "dashboard.posts.create",
            "store" => "dashboard.posts.store",
            "edit" => "dashboard.posts.edit",
            "update" => "dashboard.posts.update",
            "destroy" => "dashboard.posts.destroy",
        ])
        ->parameters([
            "posty" => "post",
        ]);
});

// It may be changed in the future
Route::get("panel", function () {
    return redirect(route("dashboard.posts.index"));
})
    ->name("dashboard")
    ->middleware("auth");

require __DIR__ . "/auth.php";
