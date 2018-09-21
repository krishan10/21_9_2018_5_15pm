@extends('layouts.app')

@section('content')
    @foreach($quizes as $quiz)
    <br><br>
        {!!$quiz->course_quiz_question!!}
            <br><br>
        <p>A: {!!$quiz->course_quiz_a!!}</p>
        <p>B: {!!$quiz->course_quiz_b!!}</p>
        <p>C: {!!$quiz->course_quiz_c!!}</p>
        <p>D: {!!$quiz->course_quiz_d!!}</p>
        <p>Correct Answer: {!!$quiz->course_quiz_answer!!}</p>
        <br>
    @endforeach
    <a href="/quiz/{{$quiz->course_id}}/edit" class="btn btn-primary">Edit/Update Quiz</a>
    <a href="/topic/{{$quiz->course_id}}" class="btn btn-danger">Back</a>
@endsection