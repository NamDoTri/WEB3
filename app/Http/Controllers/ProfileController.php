<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class ProfileController extends Controller
{
    public function index(\App\User $user)
    {
        //TODO: if the numbers are bigger than 10k, divide them by 1k before passing to the view
        return view('profile/index',[
            'user' => $user,
        ]);
    }

    public function updateInstagram(\App\User $user){
        //the argument passed in is userid, query for handle

        //then update the posts here


        return redirect('/profile/'.$user->id);
    }
}
