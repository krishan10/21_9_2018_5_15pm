@extends('layouts.app')

@section('content')
<table class="table table-striped">
    @foreach($feeds as $feed)
    
        <div class="well">
            <h2><a href="/newsfeed/{{$feed->newsfeed_id}}">{{$feed->newsfeed_status}}</a></h2>
            
        </div>
        
    @endforeach
</table>
    <a href="/newsfeed/create" class="btn btn-primary">Add Feed</a>
@endsection