<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('posts/create');
    }
    public function store(){
        $data = request()->validate([
            'caption' => '',
            'image' => 'required|image',
        ]);

        auth()->user()->posts()->create($data);
    }
}
