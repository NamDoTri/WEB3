<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $guarded = [];
    public function index()
    {
        return view('profile.index');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function critic(){
        return $this->hasOne(Critic::class);
    }
}
