@extends('layouts.app')

@section('content')
<br><br>
        <div class="">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>

                
              </div>
              <!-- /.card-header -->
              <br><br>
              <div class="">
                @if(count($users) > 0)
                  <table class="table " id="datatable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        <td>
                        <div class="button-uniform">
                          <a href="user/{{$user->id}}/edit" class="btn btn-default bg-gray btn-sm" data-toggle="modal" data-target="#exampleModal">Edit/Update</a>
                          <br>
                          <a href="courses/{{$user->id}}" class="btn btn-primary btn-sm">Show Courses</a>
                        </div>
                        </td>
                        <td>
                          {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                          {!!Form::close()!!}
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                    
                </table>
                @else
                    <p>No Users Added</p>
                  @endif
              </div>

          
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <a href="/user/create" class="btn btn-success">Add User</a>
          </div>
          <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>sjfgejfgAJKgf</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
<script>
  swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this imaginary file!',
  type: 'success',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel plx!',
  confirmButtonClass: 'confirm-class',
  cancelButtonClass: 'cancel-class',
  closeOnConfirm: false,
  closeOnCancel: false
});
</script>
@endsection