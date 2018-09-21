@extends('layouts.app')

@section('content')
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
                @if(count($subtopics) > 0)
                  <table class="table" id="datatable">
                    <thead class="thead-dark">
                      <tr>
                        <th>Sub Topic</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($subtopics as $subtopic)
                            <tr>
                                <td style="width:60%;">{{$subtopic->sub_topics_name}}</td>
                                <td style="width:40%;" class="text-center">
                                    <a href="/notes/{{$subtopic->sub_topics_id}}" class="btn btn-info">Show Content</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>No Topics added</p>
                  @endif
                  
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
                                        
    </div>
</div>
    
@endsection