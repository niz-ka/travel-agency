<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [MainController::class, "index"])->name("index");
Route::resource("posty", PostController::class)
    ->names([
        "index" => "posts.index",
        "create" => "posts.create",
        "store" => "posts.store",
        "show" => "posts.show",
        "edit" => "posts.edit",
        "update" => "posts.update",
        "destroy" => "posts.destroy",
    ])
    ->parameters([
        "posty" => "post",
    ]);

Route::get("/dashboard", [DashboardController::class, "index"])
    ->middleware(["auth"])
    ->name("dashboard");

require __DIR__ . "/auth.php";
