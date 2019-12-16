<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Picture;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');   
        }
        $data['pictures'] = Picture::orderBy('created_at','desc')->paginate(10);
        return view('welcome',$data);
    }
}
