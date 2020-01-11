<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Post;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as ImageManager;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        //$user = auth()->user();
        //TODO: if the numbers are bigger than 10k, divide them by 1k before passing to the view
        $img = null;
        if ($user->profile->profile_picture) {
            $filePath = (substr($user->profile->profile_picture, 0, 1) == '/') ? substr($user->profile->profile_picture, 1, strlen($user->profile->profile_picture)) : $user->profile->profile_picture;
            $img = ImageManager::make($filePath)->fit(200);
            if ($user->profile->effect == 'star') {
                $overlay = ImageManager::make('star.png')->fit(200);
                $img->mask($overlay);
            } else if ($user->profile->effect == 'grey') {
                $img->greyscale();
            } else if ($user->profile->effect == 'pixelate') {
                $img->pixelate();
            } else if ($user->profile->effect == 'invert') {
                $img->invert();
            }
            $img = $img->encode('data-url');
        }
        return view('profile/index', compact('user', 'img'));
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);
        return view('profile/edit', compact('user'));
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'effect' => 'required',
            // 'picture' => ''
        ]);

        if(request('picture')){
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
