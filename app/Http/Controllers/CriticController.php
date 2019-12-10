<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriticController extends Controller
{
    public function index(\App\User $user){
        return view('critic/index', $user);
    }
}
