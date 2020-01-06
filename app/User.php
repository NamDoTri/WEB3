<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\CanVote; //does not work for some reasons
use Overtrue\LaravelFollow\Traits\CanLike; 

class User extends Authenticatable
{
    use Notifiable;
    use CanVote, CanLike;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();
        static::created(function ($user){
            $user->profile()->create([
                'name' => $user->name,
                'followers' => 0,
                'following' => 0,
                'description' => $user->name
            ]);
        });
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }
    public function pictures(){
        return $this->hasMany(Picture::class)->orderBy('created_at', 'DESC');
    }
    public function critics(){
        return $this->hasMany(Critic::class)->orderBy('created_at', 'DESC');
    }
    public function agreeings(){
        return $this->belongsToMany(Critic::class);
    }
    public function hasRole($role) {
        return $this->getAttribute('role') == $role;
    }
}
