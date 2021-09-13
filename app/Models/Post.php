<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "slug", "content", "image", "user_id"];

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
