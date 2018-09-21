@extends('layouts.app')

@section('content')
    @foreach($quizes as $quiz)
    <br><br>
        {!!$quiz->sub_quiz_question!!}
            <br><br>
        <p>A: {!!$quiz->sub_quiz_a!!}</p>
        <p>B: {!!$quiz->sub_quiz_b!!}</p>
        <p>C: {!!$quiz->sub_quiz_c!!}</p>
        <p>D: {!!$quiz->sub_quiz_d!!}</p>
        <p>Correct Answer: {!!$quiz->sub_quiz_answer!!}</p>
        <br>
    @endforeach
    <a href="/subquiz/{{$quiz->sub_topics_id}}/edit" class="btn btn-primary">Edit/Update Quiz</a>
    <a href="/notes/{{$quiz->sub_topics_id}}" class="btn btn-danger">Back</a>
@endsection