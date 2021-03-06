<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    const DEFAULT_IMAGE_PATH = "images/no_entry_image.jpg";

    protected $fillable = [
        "title",
        "slug",
        "content",
        "image",
        "user_id",
        "category_id",
    ];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("title", "LIKE", "%{$search}%")
            ->orWhere("content", "LIKE", "%{$search}%");
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
