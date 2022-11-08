<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'id', 
        'pivot'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function blogLikes(){
        return $this->belongsToMany(Blog::class, 'user_likes');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function isAdmin(){
        $user_roles = Auth::user()->roles;
        foreach($user_roles as $role){
            if(strtolower($role->role) == 'admin'){
                return true;
            }
        }
        return false;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
