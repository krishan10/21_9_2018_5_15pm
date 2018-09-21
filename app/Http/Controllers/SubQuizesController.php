<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubQuiz;

class SubQuizesController extends Controller
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
        $quizes = SubQuiz::where('sub_topics_id', $id)->get();
        return view('subquizes.create')->with('quizes', $quizes);
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
    public function show($id)
    {
        $quizes = SubQuiz::where('sub_topics_id', $id)->get();
        if(count($quizes) > 0){
            return view('subquizes.index')->with('quizes', $quizes);
        }else{
            return view('subquizes.create')->with('sub_topics_id', $id);
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
        $questions = SubQuiz::where('sub_topics_id', $id)->get();
        if(count($questions) > 0){
            // return count($questions);
            return view('subquizes.edit')->with('questions', $questions)->with('sub_topics_id', $id)->with('number', count($questions));
        }else{
            return redirect('/subquiz/create/'.$id);
        }
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
            'course_code' => 'required',
            'course_name' => 'required',
            'course_type' => 'required'
        ]);
        $sub_quiz = SubQuiz::find($id);

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
