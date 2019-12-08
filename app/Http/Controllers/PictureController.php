<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Picture;
use Log;
use Auth;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $data['pictures'] = Picture::orderBy('id','desc')->where('user_id', $user_id)->paginate(10);
   
        return view('picture.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('picture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('file');
        $picture = new Picture;
        $picture->user_id = $user_id;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $folder = '/uploads/images/';
        $filePath = $folder . $imageName;
        $file = $image->storeAs($folder, $imageName, 'public');
        $picture->filepath = $filePath;
        $picture->save();
        return Redirect::to('pictures')
            ->with('success','Greate! Picture created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['picture_info'] = Picture::where($where)->first();
 
        return view('picture.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('file');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $folder = '/uploads/images/';
        $filePath = $folder . $imageName;
        $file = $image->storeAs($folder, $imageName, 'public');
        $update = ['filepath' => $filePath];
        Picture::where('id',$id)->update($update);
   
        return Redirect::to('pictures')
            ->with('success','Great! Picture updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Picture::where('id',$id)->delete();
   
        return Redirect::to('pictures')->with('success','Picture deleted successfully');
    }
}
