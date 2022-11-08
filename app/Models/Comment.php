<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'blog_id', 'user_id', 'created_at'];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'Asia/Kathmandu');
        $date->setTimezone('UTC');
        return $date->toDateTimeString();
    }
}
