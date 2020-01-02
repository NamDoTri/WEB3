<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Picture;
use App\Critic;

class AdminController extends Controller
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
        if (!Auth::check() || !auth()->user()->hasRole('admin')) {
            return redirect('/login');   
        }
        $data['pictures'] = Picture::orderBy('created_at','desc')
            ->join('users', 'users.id', '=', 'pictures.user_id')
            ->select('pictures.created_at', 'pictures.filepath', 'users.name', 'pictures.caption', 'pictures.id', 'pictures.user_id')
            ->paginate(100);
        return view('admin.list', $data);
    }
    public function critics()
    {
        if (!Auth::check() || !auth()->user()->hasRole('admin')) {
            return redirect('/login');   
        }
        $data['critics'] = Critic::orderBy('created_at','desc')
            ->join('pictures', 'pictures.id', '=', 'critics.picture_id')
            ->join('users', 'users.id', '=', 'critics.user_id')
            ->select('pictures.created_at', 'pictures.filepath', 'users.name', 'critics.picture_id', 
                'critics.user_id', 'critics.title', 'critics.review', 'critics.id')
            ->paginate(100);
        return view('admin.critics', $data);
    }
}
