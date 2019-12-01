<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        //TODO: if the numbers are bigger than 10k, divide them by 1k before passing to the view
        return view('home',[
            'user' => $user,
        ]);
    }
}
