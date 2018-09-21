<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index()
    {
        return view('upload');
    }
    function upload(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'image:jpg, jpeg, png,gif'
     ]);

     $image = $request->file('select_file');

     $new_name = rand() . '.' . $image->getClientOriginalExtension();

     $image->move(public_path('images'), $new_name);
     return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }
}
