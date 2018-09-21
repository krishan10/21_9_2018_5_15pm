@extends('layouts.app')

@section('content')
    <!-- <p>shfjah</p> -->
    <br><br>
    
    @foreach($notes as $note)
    
    <br><br>
    <div class="notesContent">
        <h1>{{$note->sub_topics_name}}</h1>
            <br><br>
        {!!$note->sub_topics_content!!}
    </div>
        

        <br>
        <a href="/notes/{{$note->sub_topics_id}}/edit" class="btn btn-primary editModal" data-toggle="modal" data-target="#editNotes" 
                    data-noteid="{{$note->sub_topics_id}}" 
                    data-notename="{{$note->sub_topics_name}}"
                    data-notecontent="{{$note->sub_topics_content}}"
                    data-notehide="{{$note->sub_topics_hide}}">Edit/Update Notes</a>
        <a href="/subquiz/{{$note->sub_topics_id}}" class="btn btn-primary">Show Quiz</a>
        <a href="/subtopic/{{$note->topics_id}}" class="btn btn-danger">Back</a>
        <br><br>
    @endforeach
 
    <div id="editNotes" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="fa fa-close" data-dismiss="modal">&times;</button>                 
            </div>
            <div class="modal-body">
                <form class="notesForm" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-12" for="sub_topics_name">Sub Topic Name:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="sub_topics_name" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12" for="sub_topics_content">Sub Topic Notes:</label>
                        <div class="col-sm-10">
                            <textarea name="sub_topics_content" id="sub_topics_content" class="ckeditor" cols="30" rows="10"></textarea>
                            <input class="form-control" id="sub_topics_content" type="name">
                        </div>
                    </div>
                    
                    <input type="hidden" id="sub_topics_id">
                    <input type="hidden" id="sub_topics_hide">
                </form>
                <div class="deleteContent">
                    Are you sure you want to disable <strong><span class="name"></span></strong> ?  
                    <input class="form-control" id="course_id" type="hidden">
                </div>

                <div class="publishContent">
                    Are you sure you want to publish <strong><span class="name"></span></strong> ?  
                    <input class="form-control" id="course_id_publish" type="hidden">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.editModal', function() {
        console.log('i am here');
        $('#footer_action_button').text("Update");
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').removeClass('publish');
        $('.modal-title').text('Edit Course');
        $('.deleteContent').hide();
        $('.publishContent').hide();
        $('.notesForm').show();
        console.log('notename :'+$(this).data('notename'))
        $('#sub_topics_name').val($(this).data('notename'));
        $('#sub_topics_content').val($(this).data('notecontent'));
        $('#sub_topics_id').val($(this).data('noteid'));
        $('#sub_topics_hide').val($(this).data('notehide'));
        $('#editNotes').modal('show');
    });

    $(document).on('click', '.edit', function(){
        $.ajax({
            type: 'post',
            url: '/notes/ajaxupdate',
            data: {
                '_token': $('input[name=_token]').val(),
                'sub_topics_id': $("#sub_topics_id").val(),
                'sub_topics_name': $("#sub_topics_name").val(),
                'sub_topics_content': $("#sub_topics_content").val(),
                'sub_topics_hide': $("#sub_topics_hide").val()
            },
            success: function(data){
                $('.notesContent').replaceWith("<div class='notesContent'><h1>"+data.sub_topics_name+"</h1><br><br>{!!"+data.sub_topics_content+"!!}</div>");
            }
        });
    });
</script>
@endsection