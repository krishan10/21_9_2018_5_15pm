@extends('layouts.app')

@section('content')
<form role="form">
    <div class="jumbotron col-md-12">
            <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create User</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" placeholder="*Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
    </div>
  </form>
@endsection