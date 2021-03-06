@extends('layouts.app')

@section('content')
{{$feed->newsfeed_id}}
<form method="post" action="/newsfeed/36" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
     <tr><textarea name="post" id="" cols="30" rows="10"class="form-control" placeholder="Post...!" required>{{$feed->newsfeed_status}}</textarea></tr>
     <tr><img src="{{$feed->newsfeed_picture}}" alt=""></tr>
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30"><input type="file" name="select_file" /></td>
       <td width="30%" align="left"><input type="submit" name="upload" class="btn btn-primary" value="Upload"></td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">jpg, jpeg, png, gif</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>
@endsection