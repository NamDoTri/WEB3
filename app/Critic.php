<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeVoted;
use Overtrue\LaravelFollow\Traits\CanBeLiked;

class Critic extends Model
{
    use CanBeVoted, CanBeLiked;

    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function picture(){
        return $this->belongsTo(Picture::class);
    }
    public function agreers(){
        return $this->belongsToMany(User::class);
    }
}
