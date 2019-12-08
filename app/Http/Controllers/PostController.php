<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('posts/create');
    }
    
    public function show(\App\Post $post){
        return view('posts/show', compact('post'));
    }

    public function store(){
        $data = request()->validate([
            'caption' => '',
            'image' => 'required|image',
        ]);

        auth()->user()->posts()->create($data);
    }
}