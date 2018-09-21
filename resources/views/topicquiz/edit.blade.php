@extends('layouts.app')

@section('content')
  
    {!! Form::open(['action' => ['TopicQuizesController@update', $topics_id], 'method' => 'POST']) !!}
    <table class = "table" id="question_add">
    <?php $num = 1; ?>
        @foreach($topic_questions as $topic_question)
        <input type="hidden" id="test" value="{{$number}}"/>
            <tr>
                <div class="form-group">
                    <h2><label for="module_quiz_question">Question <?php echo $num ?></label></h2>
                    <textarea name="module_quiz_question" id="<?php $num ?>" class= "form-control ckeditor" placeholder= "Question">{{$topic_question->module_quiz_question}}</textarea>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <h2><label for="module_quiz_a">Option 1</label></h2>
                            <textarea name="module_quiz_a" id="<?php $num ?>" class= "form-control ckeditor" placeholder= "Question">{{$topic_question->module_quiz_a}}</textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <h2><label for="module_quiz_b">Option 2</label></h2>
                            <textarea name="module_quiz_b" id="<?php $num ?>" class= "form-control ckeditor" placeholder= "Question">{{$topic_question->module_quiz_b}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <h2><label for="module_quiz_c">Option 3</label></h2>
                            <textarea name="module_quiz_c" id="<?php $num ?>" class= "form-control ckeditor" placeholder= "Question">{{$topic_question->module_quiz_c}}</textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <h2><label for="module_quiz_d">Option 4</label></h2>
                            <textarea name="module_quiz_d" id="<?php $num ?>" class= "form-control ckeditor" placeholder= "Question">{{$topic_question->module_quiz_d}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h2><label for="module_quiz_answer">Correct Answer</label></h2>
                    <input type="text" name="module_quiz_answer" value="{{$topic_question->module_quiz_answer}}" class= "form-control ckeditor bg-success">
                    
                </div>

            </tr>
            <?php $num++; ?>
        @endforeach
        </table>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
        {{Form::button('Add Question', ['class' => 'btn btn-success', 'id' => 'addButton', 'name' => 'addButton'])}}
    
        
    {!! Form::close() !!}
   <br><br><br>

   
@endsection

@section('myscripts')
<script>
    $(document).ready(function(){
        console.log($('#test').val());
        var i = $('#test').val();
        
        $('#addButton').click(function(){
            i++;
            $('#question_add').append('<tr id="row'+i+'"><td><div class="form-group"><h2><label for="sub_quiz_question">Question '+i+'</label></h2><button type="button" name="remove" id="'+i+'" class="btn btn-danger remove_btn"></button></div></td></tr>');
            console.log('Add '+i);
        });
        $(document).on('click', '.remove_btn', function(){
            var bt_id = $(this).attr("id");
            
            $('#row'+bt_id+'').remove();
            console.log('remove '+bt_id);
            i--;
        });
        
    });
   </script>
@endsection