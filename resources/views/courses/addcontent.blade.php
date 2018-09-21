@extends('layouts.app')

@section('content')
    @auth
        <p>authorized</p>
        <h1>{{$course->course_name}}</h1>
        <h1>{{$course->course_id}}</h1>
        <h2>{{$id}}</h2>
        
    @else
        <p>Unauthorized</p>
    @endauth
@endsection