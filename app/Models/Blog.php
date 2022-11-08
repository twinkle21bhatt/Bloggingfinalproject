<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'like'. 'image', 'user_id', 'category_id'];

    protected $hidden = ['id', 'pivot'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function userLikes(){
        return $this->belongsToMany(User::class, 'user_likes');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
