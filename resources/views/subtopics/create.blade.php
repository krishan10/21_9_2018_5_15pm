@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => 'SubTopicsController@store', 'method' => 'POST']) !!}
            <h1>Create Subtopic</h1>
            <div class="form-group">
                {{Form::label('sub_topics_name', 'Subtopic Name')}}
                {{Form::text('sub_topics_name', '', ['class' => 'form-control', 'placeholder' => 'Subtopic Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('sub_topics_content', 'Notes')}}
                {{Form::textarea('sub_topics_content', '', ['class' => 'form-control ckeditor', 'placeholder' => 'Notes'])}}
            </div>

            {{Form::hidden('topic_id', $topic_id)}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            <a href="/subtopic/{{$topic_id}}" class = "btn btn-danger float-left">Back</a>
        {!! Form::close() !!}
@endsection