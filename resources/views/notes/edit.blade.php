@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => ['NotesController@update', $note->sub_topics_id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('sub_topics_name', 'Sub Topic Name')}}
            {{Form::text('sub_topics_name', $note->sub_topics_name, ['class' => 'form-control', 'placeholder' => 'Sub-topic Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('sub_topics_content', 'Sub Topic Notes')}}
            {{Form::textarea('sub_topics_content', $note->sub_topics_content, ['class' => 'form-control ckeditor', 'placeholder' => 'Enter Notes Here'])}}
        </div>

        
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
        <a href="/notes/{{$note->sub_topics_id}}" class = "btn btn-danger float-right">Back</a>
    {!! Form::close() !!}
@endsection