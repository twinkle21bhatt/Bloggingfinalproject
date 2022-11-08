<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['category', 'slug'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
}
