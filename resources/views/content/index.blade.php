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

                <div class="card-tools">
                  <!-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div> -->
                  
                  {!! Form::open(['action' => 'TopicsController@index', 'method' => 'GET']) !!}
                    {{Form::text('search', '', ['class' => 'form-control form-control-sm ml-3 w-75', 'placeholder' => 'Search Topic'])}}
                  {!! Form::close() !!}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                @if(count($topics) > 0)
                  <table class="table table-hover">
                    <tr>
                      <th>Title</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    @foreach($topics as $topic)
                    <tr>
                        <td>{{$topic->topics_title}}</td>
                        <td><a href="/courses/{{$topic->topics_id }}/edit" class="btn btn-default bg-gray">Edit/Update</a></td>
                        <td><a href="/subtopic/{{$topic->topics_id}}" class="btn btn-default bg-primary">Add Subtopic</a></td>
                        <td>
                          {!!Form::open(['action' => ['CoursesController@destroy', $course->course_id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                          {!!Form::close()!!}
                        </td>
                    </tr>
                    @endforeach
                </table>
                @else
                    <p>No courses added</p>
                  @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endauth
@endsection