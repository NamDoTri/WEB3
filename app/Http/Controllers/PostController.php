<?php

namespace App\Http\Controllers;

use Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user();
        return redirect('/profile/'.$user->id);
    }

    public function create(){
        return view('posts/create');
    }
    
    public function show(\App\Post $post){
        return view('posts/show', compact('post'));
    }

    public function edit(\App\Picture $picture){
        return view('posts/edit', compact('picture'));
    }

    public function store(){
        $data = request()->validate([
            'caption' => 'required|min:6',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|max:500000',
        ]);

        auth()->user()->posts()->create($data);
        return redirect('/');
    }
    public function update(\App\Picture $picture){
        $data = request()->validate([
            'caption' => 'required|min:6',
            'file' => 'required|simage|mimes:jpeg,png,jpg,gif,svg|max:2048|max:500000',
        ]);
        
        $imagePath = request('picture')->store('/uploads/images', 'public');
        
        $toSave = [
            'filepath' => '/'.$imagePath,
            'caption' => $data['caption']
        ];
        $picture->update($toSave);
        return redirect('/');
    }
}
