@extends('layouts.app')

@section('content')
    @auth
        {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}
            <h1>Create Course</h1>
            <div class="form-group">
                {{Form::label('course_code', 'Course Code')}}
                {{Form::text('course_code', '', ['class' => 'form-control', 'placeholder' => 'Course Code'])}}
            </div>

            <div class="form-group">
                {{Form::label('course_name', 'Course Name')}}
                {{Form::text('course_name', '', ['class' => 'form-control', 'placeholder' => 'Course Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('course_type', 'Type')}}
                {{Form::text('course_type', '', ['class' => 'form-control', 'placeholder' => 'Type'])}}
            </div>

            <!-- <div class="form-group">
                {{Form::label('body', 'Notes')}}
                {{Form::textarea('body', '', ['id'=> 'ckeditor', 'class' => 'form-control ckeditor', 'placeholder' => 'Notes area'])}}
            </div> -->

            {{Form::submit('Upload', ['class' => 'btn btn-primary'])}}
            <a href="/courses" class = "btn btn-danger float-right">Back</a>
        {!! Form::close() !!}
    @else
    <h2>Please log in first!!</h2>
    @endauth
@endsection