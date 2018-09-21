@extends('layouts.app')

@section('content')
    <!-- <p>shfjah</p> -->
    <br><br>
    @foreach($subtopics as $subtopic)
        <h1>{{$subtopic->sub_topics_name}}</h1>
        <br><br>
        {!!$subtopic->sub_topics_content!!}
    @endforeach
@endsection