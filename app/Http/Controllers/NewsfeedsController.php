<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Newsfeed;

class NewsfeedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Auth::user()->id;
        $feeds = Newsfeed::where('users_id', '=', Auth::user()->id)->get();
        // return $feeds;
        if(count($feeds) > 0){
            return view('newsfeed.index')->with('feeds', $feeds);
        }else{
            return view('newsfeed.create');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsfeed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'post' => 'required',
        // ]);
        // return $request;
        if($request->hasFile('select_file')){
            $this->validate($request, [
            'select_file'  => 'image:jpg, jpeg, png,gif,dimensions:max_height=410,max_width=510'
           ]);
      
           $image = $request->file('select_file');
      
           $new_name = '/images/'.time() . '.' . $image->getClientOriginalExtension();
      
           $image->move(public_path('images'), $new_name);
           
        //    return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
        }else{
            $new_name = null;
        }
        // return 'no pic';
        $feed = new  Newsfeed;
        $feed->newsfeed_status = $request->input('post');
        $feed->newsfeed_picture = $new_name;
        $feed->newsfeed_hide = '0';
        $feed->users_id = Auth::user()->id;
        $feed->newsfeed_timestamp = time();
        $feed->save();
        return redirect('/newsfeed');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feed = Newsfeed::find($id);
        return view('newsfeed.view')->with('feed', $feed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return "edit";
        $feed = Newsfeed::find($id);
        return view('newsfeed.edit')->with('feed', $feed);
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
        return 'sefd';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
