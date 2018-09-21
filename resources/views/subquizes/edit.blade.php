@extends('layouts.app')

@section('content')
  
    {!! Form::open(['action' => ['SubQuizesController@update', $sub_topics_id], 'method' => 'POST']) !!}
    <table class = "table" id="question_add">
    <?php $num = 1; ?>
        
        
            <tr>
                <div class="form-group">
                    <h2>{{Form::label('sub_quiz_question', 'Question')}}</h2>
                    {{Form::textarea('sub_quiz_question', '', ['class' => 'form-control ckeditor', 'id' => 'article-ckeditor', 'placeholder' => 'Sub-topic Title'])}}
                </div>
                
                <div class="row">
                    <div class="col">
                        
                        <div class="form-group">
                            {{Form::label('sub_quiz_a', 'Option 1')}}
                            {{Form::textarea('sub_quiz_a', '', ['class' => 'form-control ckeditor'])}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        {{Form::label('sub_quiz_b', 'Option 2')}}
                        {{Form::textarea('sub_quiz_b', '', ['class' => 'form-control ckeditor'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        {{Form::label('sub_quiz_c', 'Option 3')}}
                        {{Form::textarea('sub_quiz_c', '', ['class' => 'form-control ckeditor'])}}
                        </div>
                    </div>
                    <div class="col" style="height:100px;">
                        <div class="form-group">
                        {{Form::label('sub_quiz_d', 'Option 4')}}
                        {{Form::textarea('sub_quiz_d', '', ['class' => 'form-control ckeditor', 'style' => 'height:200px'])}}
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    {{Form::label('sub_quiz_answer', 'Correct Answer')}}
                    {{Form::text('sub_quiz_answer', '', ['class' => 'form-control ckeditor bg-success text-white', 'placeholder' => 'Enter Correct Answer'])}}
                </div>
            </tr> </table>
            {{Form::button('Save', ['class' => 'btn btn-primary float-right'])}}
            <?php $num++; ?>
            <br><br>
    <input type="hidden" id="test" value="{{$number}}"/>
    <table class="table table-striped">
             <thead>
                <th>Question</th>
                <th></th>
            </thead>
           <tbody>
             @foreach($questions as $question)
                <tr>
                    <td>{!!$question->sub_quiz_question!!}</td>
                    <td>{{Form::button('Edit Question', ['class' => 'btn btn-default bg-gray', 'id' => 'edit', 'name' => 'edit'])}}</td>
                </tr>
            @endforeach
        </tbody>
    
   </table>
   <a href="/subquiz/{{$question->sub_topics_id}}" class = "btn btn-danger">Back</a>
       
        <!-- {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
        {{Form::button('Add Question', ['class' => 'btn btn-success', 'id' => 'addButton', 'name' => 'addButton'])}} -->
    
        
    {!! Form::close() !!}
   <br><br><br>
        
@endsection

@section('myscripts')
<!-- <script>
    var table = document.getElementById('question_add');
    for(var i = 1; i < table.row.length, i++){
        table.rows[i].onclick = function(){
            document.getElementById("question->sub_quiz_question").value = this.cells[0].innerHTML;
            document.getElementById("sub_quiz_a").value = this.cells[1].innerHTML;
            document.getElementById("sub_quiz_b").value = this.cells[2].innerHTML;
            document.getElementById("sub_quiz_c").value = this.cells[3].innerHTML;
            document.getElementById("sub_quiz_d").value = this.cells[4].innerHTML;
        }
    }
</script> -->
<!-- <script>
    $(document).ready(function(){
        console.log($('#test').val());
        var i = $('#test').val();
        
        $('#addButton').click(function(){
            i++;
            $('#question_add').append('<tr id="row'+i+'"><td><div class="form-group"><h2><label for="sub_quiz_question">Question '+i+'</label></h2><h2>{{Form::label('sub_quiz_question'.$question->sub_quiz_id, 'Question ')}}</h2>{{Form::textarea('sub_quiz_question'.$question->sub_quiz_id, $question->sub_quiz_question, ['class' => 'form-control ckeditor', 'id' => 'article-ckeditor', 'placeholder' => 'Sub-topic Title'])}}<textarea name="sub_quiz_d{{$question->sub_quiz_id}}" id="{{$question->sub_quiz_d}}"  class="form-control ckeditor">{{$question->sub_quiz_d}}</textarea><button type="button" name="remove" id="'+i+'" class="btn btn-danger remove_btn">x</button></div></td></tr>');
            console.log('Add '+i);
        });
        $(document).on('click', '.remove_btn', function(){
            var bt_id = $(this).attr("id");
            
            $('#row'+bt_id+'').remove();
            console.log('remove '+bt_id);
            
        });
        
    });
   </script> -->
@endsection