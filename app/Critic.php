<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Critic extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function picture(){
        return $this->belongsTo(Picture::class);
    }
}