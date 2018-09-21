@extends('layouts.app')

@section('content')
    @foreach($topic_questions as $topic_question)
    <br><br>
        {!!$topic_question->module_quiz_question!!}
            <br><br>
        <p>A: {!!$topic_question->module_quiz_a!!}</p>
        <p>B: {!!$topic_question->module_quiz_b!!}</p>
        <p>C: {!!$topic_question->module_quiz_c!!}</p>
        <p>D: {!!$topic_question->module_quiz_d!!}</p>
        <p>Correct Answer: {!!$topic_question->module_quiz_answer!!}</p>
        <br>
    @endforeach
    <a href="/topicquiz/{{$topic_question->topics_id}}/edit" class="btn btn-primary">Edit/Update Topic Quiz</a>
    <a href="/subtopic/{{$topic_question->topics_id}}" class="btn btn-danger">Back</a>
@endsection