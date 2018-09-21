@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'foo/bar']) !!}
        <h1>Create Quiz</h1>
        {{Form::label('title', '')}}
    {!! Form::close() !!}
@endsection