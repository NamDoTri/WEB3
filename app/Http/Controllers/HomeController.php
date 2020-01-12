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
        if (auth()->user()->hasRole('admin')) {
            return redirect('/admin');
        }
        $data['pictures'] = Picture::orderBy('created_at','desc')
            ->where('user_id', '!=', auth()->user()->id)
            ->join('users', 'users.id', '=', 'pictures.user_id')
            ->select('pictures.created_at', 'pictures.filepath', 'users.name', 'pictures.caption', 'pictures.id', 'pictures.user_id')
            ->paginate(10);
        return view('welcome', $data);
    }
}
