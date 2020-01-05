<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Critic;

class CriticController extends Controller
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

    public function destroy($id){
        if (!Auth::check()) {
            return redirect('/login');   
        }
        Critic::where('id', $id)->delete();
        return Redirect::to('admin/critics')->with('success','Comment deleted successfully');
    }

    public function agree(\App\Critic $crit){
        return $crit->title;
    }
}
