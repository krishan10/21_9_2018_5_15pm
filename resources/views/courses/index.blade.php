@extends('layouts.app')

@section('content')
<br>
<br>
@auth
  <div class="">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Course List</h3>
        
      </div>
      <div class="card-body">
        <table class="table " id="datatable">
          <thead>
            <tr>
              <th>Course Code</th>
              <th>Course Name</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($courses as $course)
              <tr class="course{{$course->course_id}}">
                <td>{{$course->course_code}}</td>
                <td>{{$course->course_name}}</td>
                <td>
                  <a href="/courses/{{$course->course_id}}/edit" class="btn btn-default bg-gray btn-sm edit-modal" data-toggle="modal" data-target="#myModal" 
                    data-coursecode="{{$course->course_code}}" 
                    data-coursename="{{$course->course_name}}"
                    data-coursetype="{{$course->course_type}}"
                    data-courseid="{{$course->course_id}}"
                    data-coursepublish="{{$course->publish}}">Edit/Update</a>
                  <br>
                  <a href="/topic/{{$course->course_id}}" class="btn btn-default bg-primary btn-sm">Show Topics</a>
                </td>
                <td>
                @if($course->publish == '1')
                  <!-- <a href="" class="btn btn-danger disableCourse">Disable</a> -->
                  <div >
                  <button id="disableButton" class="btn btn-danger disableCourse" 
                  data-courseid="{{$course->course_id}}"
                  data-coursename="{{$course->course_name}}">Disable</button>
                  </div>
                @else
                <button class="btn btn-success publishCourse" data-courseid="{{$course->course_id}}" data-coursename="{{$course->course_name}}">Publish</button>
                  
                @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> 
    <a href="/courses/create" class="btn btn-success">Add Course</a>
    <a href="/dashboard" class="btn btn-danger">Back</a>
  </div>
  {{csrf_field()}}
  @include('inc.modals')

<script>
  $(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text("Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.actionBtn').removeClass('delete');
    $('.actionBtn').removeClass('publish');
    $('.modal-title').text('Edit Course');
    $('.deleteContent').hide();
    $('.publishContent').hide();
    $('.form-horizontal').show();
    $('#course_code').val($(this).data('coursecode'));
    $('#course_name').val($(this).data('coursename'));
    $('#course_type').val($(this).data('coursetype'));
    $('#course_id').val($(this).data('courseid'));
    $('#course_publish').val($(this).data('coursepublish'));
    $('#myModal').modal('show');
});

$(document).on('click', '.disableCourse', function() {
  $('#footer_action_button').text("Disable");
  $('#footer_action_button').removeClass('glyphicon-check');
  $('#footer_action_button').addClass('glyphicon-trash');
  $('.actionBtn').removeClass('btn-success');
  $('.actionBtn').addClass('btn-danger');
  $('.actionBtn').addClass('delete');
  $('.actionBtn').removeClass('edit');
  $('.actionBtn').removeClass('publish');
  $('.modal-title').text('Disable Course');
  $('.deleteContent').show();
  $('.form-horizontal').hide();
  $('.publishContent').hide();
  $('.name').html($(this).data('coursename'));
  $('#myModal').modal('show');
  $('#course_id').val($(this).data('courseid'));
  console.log("disable button-> "+$('#course_id').val());
});

$(document).on('click', '.publishCourse', function() {
  $('#footer_action_button').text("Publish Course");
  $('#footer_action_button').removeClass('glyphicon-check');
  $('#footer_action_button').addClass('glyphicon-trash');
  $('.actionBtn').removeClass('btn-danger');
  $('.actionBtn').addClass('btn-success');
  $('.actionBtn').addClass('publish');
  $('.actionBtn').removeClass('delete');
  $('.actionBtn').removeClass('edit');
  $('.modal-title').text('Publish Course');
  $('.publishContent').show();
  $('.deleteContent').hide();
  $('.form-horizontal').hide();
  $('.name').html($(this).data('coursename'));
  $('#myModal').modal('show');
  $('#course_id_publish').val($(this).data('courseid'));
  console.log("publish button-> "+$('#course_id_publish').val());
});

$(document).on('click', '.edit', function() {
  var id=$("#course_id").val();
  console.log('id: '+id);
  console.log('course code: '+$("#course_code").val());
  console.log('course name: '+$("#course_name").val());
  console.log('publish: '+$("#course_publish").val());
  console.log('type: '+$('#course_type').val());
  $.ajax({
    type: 'post',
    url: 'course/createajax',
    data: {
        '_token': $('input[name=_token]').val(),
        'course_id': $("#course_id").val(),
        'course_code': $("#course_code").val(),
        'course_name': $("#course_name").val(),
        'publish': $("#course_publish").val(),
        'course_type': $('#course_type').val()
    },
    success: function(data) {                       
      console.log(data.course_name);
      console.log(data.course_code);
      console.log(data.course_type);
      console.log(data.publish);
      console.log('edited '+ data.course_name);

      var edit = "<a href='' class='btn btn-default bg-gray btn-sm edit-modal' data-toggle='modal' data-target='#myModal' data-coursecode='"+data.course_code+"' data-coursename='"+data.course_name+"' data-coursetype='"+data.course_type+"' data-courseid='"+data.course_id+"' data-coursepublish='"+data.publish+"'>Edit/Update</a><br>";
      var show = "<a href='/topic/"+data.course_id+"' class='btn btn-default bg-primary btn-sm'>Show Topics</a>";
      
      if(data.publish == '1'){
        var published = "<button class='btn btn-danger disableCourse' data-courseid='"+data.course_id+"' data-coursename='"+data.course_name+"'>Disable</button>";
      }else{
        var published = "<button class='btn btn-success publishCourse' data-courseid='"+data.course_id+"' data-coursename='"+data.course_name+"'>Publish</button>";
      }
      $('.course'+data.course_id).replaceWith("<tr class='course"+data.course_id+"'><td>"+data.course_code+"</td><td>"+data.course_name+"</td><td>"+edit+show+"</td><td>"+published+"</td></tr>")
    }
  });
});

$(document).on('click', '.newcatbtn', function() {
  $.ajax({
      type: 'post',
      url: 'courses/ajaxcreate',
      data: {
          '_token': $('input[name=_token]').val(),
          'name': $('#newcat').val()
      },
      success: function(data) {
          if ((data.errors)){
              $('.error').removeClass('hidden');
              $('.error').text(data.errors.name);
          }
          else {
              $('.error').addClass('hidden');
              $('#newcat').val("");
              $('#table').append("<tr class='cat" + data.cat_id + "'><td><div class='input-group'><li class='form-control'>" + data.cat_name + "</li><span class='input-group-addon'><button class='edit-modal btn btn-info' style='margin:0 5px 0 5px;' data-id='" + data.cat_id + "' data-name='" + data.cat_name + "'><span class='fa fa-pencil fa-lg'></span></button></span><span class='input-group-addon'><button class='delete-modal btn btn-danger' data-id='" + data.cat_id + "' data-name='" + data.cat_name + "'><span class='fa fa-trash fa-lg'></span></button></span></div></td><td><a href='/levels/" + data.cat_id +"' class='btn btn-info'>DETAILS</a> <a href='/maps/" + data.cat_id + "' class='btn btn-info'>MAP</a> </td><td><a href='/categories/publish/" + data.cat_id + "' class='btn btn-default'><span style='color:green;'> PUBLISH </span></a></td></tr>");
          }
      },

  });
  $('#name').val('');
});

$(document).on('click', '.delete', function() {
  var id=$("#course_id").val();
  console.log(id);
  $.ajax({
    type: 'post',
    url: 'course/publish',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $("#course_id").val()
    },
    success: function(data) {
      var edit = "<a href='/courses/'"+data.course_id+"'/edit' class='btn btn-default bg-gray btn-sm edit-modal' data-toggle='modal' data-target='#myModal' data-coursecode='"+data.course_code+"' data-coursename='"+data.course_name+"' data-coursetype='"+data.course_type+"' data-courseid='"+data.course_id+"' data-coursepublish='"+data.publish+"'>Edit/Update</a><br>";
      var show = "<a href='/topic/"+data.course_id+"' class='btn btn-default bg-primary btn-sm'>Show Topics</a>";
      var published = "<button class='btn btn-success publishCourse' data-courseid='"+data.course_id+"' data-coursename='"+data.course_name+"'>Publish</button>";
      $('.course'+data.course_id).replaceWith("<tr class='course"+data.course_id+"'><td>"+data.course_code+"</td><td>"+data.course_name+"</td><td>"+edit+show+"</td><td>"+published+"</td></tr>")
        console.log('disabled '+ data.course_name);
      }
  });
});

$(document).on('click', '.publish', function() {
  var id=$("#course_id_publish").val();
  console.log(id);
  $.ajax({
    type: 'post',
    url: 'course/publish',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $("#course_id_publish").val()
    },
    success: function(data) {
      var edit = "<a href='/courses/'"+data.course_id+"'/edit' class='btn btn-default bg-gray btn-sm edit-modal' data-toggle='modal' data-target='#myModal' data-coursecode='"+data.course_code+"' data-coursename='"+data.course_name+"' data-coursetype='"+data.course_type+"' data-courseid='"+data.course_id+"' data-coursepublish='"+data.publish+"'>Edit/Update</a><br>";
      var show = "<a href='/topic/"+data.course_id+"' class='btn btn-default bg-primary btn-sm'>Show Topics</a>";
      var published = "<button class='btn btn-danger disableCourse' data-courseid='"+data.course_id+"' data-coursename='"+data.course_name+"'>Disable</button>";
      
      $('.course'+data.course_id).replaceWith("<tr class='course"+data.course_id+"'><td>"+data.course_code+"</td><td>"+data.course_name+"</td><td>"+edit+show+"</td><td>"+published+"</td></tr>")
      console.log('published '+ data.course_name);
    }
  });
  
});

$(document).on('click','.published', function() {
  console.log('I am here');
});
</script>

@endauth
@endsection
