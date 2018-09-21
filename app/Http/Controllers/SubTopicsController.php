<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubTopic;

class SubTopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('subtopics.create')->with('topic_id', $id);
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
            'sub_topics_name' => 'required',
            'sub_topics_content' => 'required'
        ]);
        $subtopic = new SubTopic;
        $subtopic->sub_topics_name = $request->input('sub_topics_name');
        $subtopic->sub_topics_content = $request->input('sub_topics_content');
        $subtopic->topics_id = $request->input('topic_id');
        $subtopic->sub_topics_hide = '0';
        $subtopic->save();

        return redirect('/subtopic/'.$request->topic_id.'')->with('success', 'Course Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//topic id
    {
        $subtopics = SubTopic::where('topics_id', '=', $id)->get();
        if(count($subtopics) > 0){
            return view('subtopics.index')->with('subtopics', $subtopics);
        } else{
            return view('subtopics.create')->with('topic_id', $id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
