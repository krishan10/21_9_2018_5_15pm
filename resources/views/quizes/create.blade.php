@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'foo/bar']) !!}
        <h1>Create Course Quiz</h1>
    {!! Form::close() !!}
@endsection