<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Picture;
use PDF;
use Log;
use Auth;
use Intervention\Image\ImageManagerStatic as ImageManager;

class PictureController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');   
        }
        if (auth()->user()->hasRole('admin')) {
            return redirect('/admin');
        }
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
        if (!Auth::check()) {
            return redirect('/login');   
        }
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
        if (!Auth::check()) {
            return redirect('/login');   
        }
        if (auth()->user()->hasRole('admin')) {
            return redirect('/admin');
        }
        $user_id = auth()->user()->id;
        $request->validate([
            'caption' => 'required|min:6',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|max:500000',
        ]);
        $image = $request->file('file');
        $picture = new Picture;
        $picture->user_id = $user_id;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $folder = '/uploads/images/';
        $filePath = $folder . $imageName;
        $file = $image->storeAs($folder, $imageName, 'public');
        $picture->caption = $request->caption;
        $picture->filepath = $filePath;
        $picture->save();
        return Redirect::to('/')
            ->with('success','Greate! Picture created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Picture $picture)
    {
        $filePath = (substr($picture->filepath, 0, 1) == '/') ? substr($picture->filepath, 1, strlen($picture->filepath)) : $picture->filepath;
        //$filePath = (substr($picture->filepath, 0, 1) == '/' ? substr($picture->filePath, 1, strlen($picture->filepath)) : $picture->filepath);
        //return $filePath;
        $img = ImageManager::make($filePath)->fit(1000);
        $watermak = ImageManager::make('watermark.png')->fit(1000);
        $img->insert($watermak);
        $picture->filepath = $img->encode('data-url');
        return view('picture/show', compact('picture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('/login');   
        }
        if (auth()->user()->hasRole('admin')) {
            return redirect('/admin');
        }
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
        if (!Auth::check()) {
            return redirect('/login');   
        }
        if (auth()->user()->hasRole('admin')) {
            return redirect('/admin');
        }
        $request->validate([
            'caption' => 'required|min:6',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|max:500000',
        ]);
        $image = $request->file('file');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $folder = '/uploads/images/';
        $filePath = $folder . $imageName;
        $file = $image->storeAs($folder, $imageName, 'public');
        $update = ['filepath' => $filePath];
        Picture::where('id', $id)->update($update);
   
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
        if (!Auth::check()) {
            return redirect('/login');   
        }
        Picture::where('id', $id)->delete();
   
        if (auth()->user()->hasRole('admin')) {
            return Redirect::to('admin')->with('success','Picture deleted successfully');
        }
        return Redirect::to('pictures')->with('success','Picture deleted successfully');
    }

    public function export(\App\Picture $picture)
    {
        if (!Auth::check()) {
            return redirect('/login');   
        }
        $filePath = (substr($picture->filepath, 0, 1) == '/') ? substr($picture->filepath, 1, strlen($picture->filepath)) : $picture->filepath;
        //$filePath = (substr($picture->filepath, 0, 1) == '/' ? substr($picture->filePath, 1, strlen($picture->filepath)) : $picture->filepath);
        $img = ImageManager::make($filePath)->fit(1000);
        $watermak = ImageManager::make('watermark.png')->fit(1000);
        $img->insert($watermak);
        $picture->filepath = $img->encode('data-url');
        $data = [
            'title' => 'Extraction of picture from ' . $picture->user->profile->name,
            'heading' => 'Extraction of picture from ' . $picture->user->profile->name,
            'content' => $picture->caption,
            'picture' => $picture,
        ];          
        $pdf = PDF::loadView('picture.export', $data);  
        return $pdf->download('mockInsta_export_picture_id_' . $picture->id . '.pdf');
    }
}
