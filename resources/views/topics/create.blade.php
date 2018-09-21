@extends('layouts.app')

@section('content')
    @auth
        {!! Form::open(['action' => 'TopicsController@store', 'method' => 'POST']) !!}
            <h1>Create Topic</h1>
            <div class="form-group">
                {{Form::label('topics_title', 'Topic Title')}}
                {{Form::text('topics_title', '', ['class' => 'form-control', 'placeholder' => 'Topic Title'])}}
            </div>

            <!-- <div class="form-group">
                {{Form::label('body', 'Notes')}}
                {{Form::textarea('body', '', ['id'=> 'ckeditor', 'class' => 'form-control ckeditor', 'placeholder' => 'Notes area'])}}
            </div> -->
            {{Form::hidden('course_id', $course_id)}}
            {{Form::submit('Upload', ['class' => 'btn btn-primary'])}}
            <a href="/courses" class = "btn btn-danger float-right">Back</a>
        {!! Form::close() !!}
    @else
    <h2>Please log in first!!</h2>
    @endauth
@endsection