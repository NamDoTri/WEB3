<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Critic;

class CriticController extends Controller
{
    public function index(\App\User $user){
        return view('critic/index', $user);
    }
    public function create(\App\Picture $picture){
        return view('critic/create', compact('picture'));
    }
    public function store(\App\Picture $picture){
        $data = request()->validate([
            'title' => 'required',
            'review' => 'required|min:100',
        ]);
        $data = array_merge($data,[
            'user_id' => auth()->user()->id,
            'picture_id' => $picture->id
        ]);
        Critic::create($data);
        return redirect('/');
    }
}
