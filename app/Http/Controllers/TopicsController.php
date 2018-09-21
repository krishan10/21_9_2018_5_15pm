<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Course;
use DB;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('search')){
            $topics = Topic::where('topics_title', 'like', request('search').'%')->get();
        }else{
            $topics = Topic::where('course_id', '=', $id)->get();
        }
        
        return view('topics.index')->with('topics', $topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)//course id
    {
        return view('topics.create')->with('course_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'topics_title' => 'required'
        ]);
        $topic = new Topic;
        $topic->topics_title = $request->input('topics_title');
        $topic->save();

        return redirect('/topics')->with('success', 'Topic Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//course id
    {
        // $course = Course::where('topics_id', '=', $id)->get();
        
        $topics = Topic::where('course_id', '=', $id)->get();
        

            return view('topics.index')->with('topics', $topics)->with('course_id', $id);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'topic edit';
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
        //
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

    /**
     * Get Course ID to show topics
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showback($tid)
    {
        $cid = Topic::Where('topics_id', $tid)->value('course_id');
        //$cat_id =  DB::table('topics')->where('topics_id',$subtopic->topics_id)->value('course_id');
        // $topics = Topic::where('course_id', '=', $cid)->get();
        return redirect('/topic/'.$cid.'');
        // return view('topics.index')->with('topics', $topics);        
    }
}
