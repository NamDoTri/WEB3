<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class ProfileController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        $posts = Post::findOrFail($user);
        //TODO: if the numbers are bigger than 10k, divide them by 1k before passing to the view
        return view('profile/index',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function updateInstagram($user){
        $user = User::findOrFail($user);
        //the argument passed in is userid, query for handle

        //then update the posts here


        return redirect('/profile/'.$user->id);
    }
}
