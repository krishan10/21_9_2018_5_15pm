<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubTopic;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//subtopic id
    {
        $match = ['sub_topics_id' => $id, 'sub_topics_hide' => '0'];
        $notes = SubTopic::where($match)->get();
        if(count($notes) > 0){
            return view('notes.index')->with('notes', $notes);
        }else{
            return view('notes.create');
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
        $note = SubTopic::find($id);
        return view('notes.edit')->with('note', $note);
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
        $this->validate($request, [
            'sub_topics_name' => 'required',
            'sub_topics_content' => 'required'
        ]);
        $sub_topic = SubTopic::find($id);
        $sub_topic->sub_topics_name = $request->input('sub_topics_name');
        $sub_topic->sub_topics_content = $request->input('sub_topics_content');
        $sub_topic->sub_topics_hide = '0';
        $sub_topic->save();

        return redirect('/notes/'.$sub_topic->sub_topics_id.'')->with('success', 'Notes Updated');
    }

    public function ajaxupdate(Request $request)
    {
        $this->validate($request, [
            'sub_topics_id' => 'required',
            'sub_topics_name' => 'required',
            'sub_topics_content' => 'required'
        ]);
        $id = $request->sub_topics_id;
        $sub_topic = SubTopic::find($id);
        $sub_topic->sub_topics_name = $request->input('sub_topics_name');
        $sub_topic->sub_topics_content = $request->input('sub_topics_content');
        $sub_topic->sub_topics_hide = '1';
        $sub_topic->save();
        return $sub_topic;
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
