<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        //TODO: if the numbers are bigger than 10k, divide them by 1k before passing to the view
        return view('profile/index', compact('user'));
    }

    public function edit(User $user){
        return view('profile/edit', compact('user'));
    }

    public function update(User $user){
        $data = request()->validate([
            'name' => 'required',
            'description' => ''
        ]);
        $user->profile->update($data);
        return redirect('profile/'.$user->id);
    }

    public function updateInstagram(User $user){
        //the argument passed in is userid, query for handle

        //then update the posts here


        return redirect('/profile/'.$user->id);
    }
}
