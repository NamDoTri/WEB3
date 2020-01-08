<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('search/index');
    }
    public function search(){
        // algolia is premium so just gonna use normal way of searching
        $username = request()->username;
        $items = \App\User::where([
            ['name', 'like', '%'.$username.'%'],
        ])->get();
        return view('search/show', compact('items'));
    }
}
