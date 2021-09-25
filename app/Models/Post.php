<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    const DEFAULT_IMAGE_PATH = "images/no_entry_image.jpg";

    protected $fillable = ["title", "slug", "content", "image", "user_id"];
    protected $with = ["author"];

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
