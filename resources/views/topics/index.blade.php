@extends('layouts.app')

@section('content')
<br>
<br>
@auth
<!-- <a href="/dashboard" class="btn btn-danger float-left">Back</a>
<a href="/courses/create" class="btn btn-success float-right">Add Course</a> -->
<br><br>

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Topic List</h3>
              </div>
              <!-- /.card-header -->
              <br><br>
              <div class="card-body table-responsive">
                @if(count($topics) > 0)
                  <table class="table" id="datatable">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($topics as $topic)
                      <tr>
                          <td>{{$topic->topics_title}}</td>
                          <td class="text-center">
                            <a href="/topic/{{$topic->topics_id}}/edit" class="btn btn-default bg-gray btn-sm w-50">Edit/Update</a>
                            <br>
                            <a href="/subtopic/{{$topic->topics_id}}" class="btn btn-default bg-primary btn-sm w-50">Show Subtopic</a></td>
                          <td class="text-center">
                            {!!Form::open(['action' => ['TopicsController@destroy', $topic->topics_id], 'method' => 'POST'])!!}
                              {{Form::hidden('_method', 'DELETE')}}
                              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                @else
                    <p>No courses added</p>
                  @endif
                  
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <a href="/topic/create/{{$topic->course_id}}" class="btn btn-success">Add Topic</a>
                <a href="/quiz/create/{{$topic->course_id}}" class="btn btn-success">Add Course Quiz</a>
              </div>
        </div>
@endauth
@endsection