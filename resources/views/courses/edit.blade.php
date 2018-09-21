@extends('layouts.app')

@section('content')
    @auth
        <h2>Edit</h2>

        {!! Form::open(['action' => ['CoursesController@update', $course->course_id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('course_code', 'Course Code')}}
                {{Form::text('course_code', $course->course_code, ['class' => 'form-control', 'placeholder' => 'Course Code'])}}
            </div>

            <div class="form-group">
                {{Form::label('course_name', 'Course Name')}}
                {{Form::text('course_name', $course->course_name, ['class' => 'form-control', 'placeholder' => 'Course Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('course_type', 'Course Type')}}
                {{Form::text('course_type', $course->course_type, ['class' => 'form-control', 'placeholder' => 'Course Type'])}}
            </div>

            <!-- <div class="form-group">
                {{Form::label('body', 'Notes')}}
                {{Form::textarea('body', '', ['id'=> 'ckeditor', 'class' => 'form-control ckeditor', 'placeholder' => 'Notes area'])}}
            </div> -->
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
            <a href="/courses" class = "btn btn-danger float-right">Back</a>
        {!! Form::close() !!}
    @else
    <h2>Please log in first!!</h2>
    @endauth
@endsection