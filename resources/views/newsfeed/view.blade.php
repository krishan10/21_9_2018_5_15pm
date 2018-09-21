@extends('layouts.app')

@section('content')
<br><br>
<div style="height:500px;">
    {!!$feed->newsfeed_status!!}
    <br><br>
    <img src="{{$feed->newsfeed_picture}}" alt="">
</div>

<br><br>
<a href="/newsfeed/{{$feed->newsfeed_id}}/edit" class="btn btn-primary">Edit Post</a>
@endsection