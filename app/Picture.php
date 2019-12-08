<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function index()
    {
        return view('profile.index');
    }
}
