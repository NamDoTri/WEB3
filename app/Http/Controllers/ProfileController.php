<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        //$user = auth()->user();
        //TODO: if the numbers are bigger than 10k, divide them by 1k before passing to the view
        return view('profile/index', compact('user'));
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);
        return view('profile/edit', compact('user'));
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'name' => 'required',
            'description' => '',
            // 'picture' => ''
        ]);

        if( request('picture') ){
            $imagePath = request('picture')->store('uploads/profile', 'public');

            $image = Image::make(public_path("{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['profile_picture' => '/'.$imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect('profile/'.$user->id);
    }

    public function updateInstagram(User $user){
        //the argument passed in is userid, query for handle

        //then update the posts here


        return redirect('/profile/'.$user->id);
    }
}
