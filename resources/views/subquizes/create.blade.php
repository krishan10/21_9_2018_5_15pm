@extends('layouts.app')

@section('content')
    
    <h1>this is subquiz create</h1>
    {!! Form::open(['action' => ['SubQuizesController@store', $sub_topics_id], 'method' => 'POST']) !!}
    <table class = "table" id="question_add">
    <?php $num = 1; ?>
        
            <tr>
                <div class="form-group">
                    <h2>{{Form::label('sub_quiz_question', 'Question '.$num)}}</h2>
                    {{Form::textarea('sub_quiz_question', '', ['class' => 'form-control ckeditor', 'id' => 'article-ckeditor', 'placeholder' => 'Sub-topic Title'])}}
                </div>
                
                <div class="row">
                    <div class="col">
                        <input type="hidden" id="test" value="{{$num}}"/>
                        <div class="form-group">
                            {{Form::label('sub_quiz_a', 'Option 1')}}
                            {{Form::textarea('sub_quiz_a', '', ['class' => 'form-control ckeditor', 'placeholder' => 'Enter Notes Here'])}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        {{Form::label('sub_quiz_b', 'Option 2')}}
                        {{Form::textarea('sub_quiz_b', '', ['class' => 'form-control ckeditor', 'placeholder' => 'Enter Notes Here'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        {{Form::label('sub_quiz_c', 'Option 3')}}
                        {{Form::textarea('sub_quiz_c', '', ['class' => 'form-control ckeditor', 'placeholder' => 'Enter Notes Here'])}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        {{Form::label('sub_quiz_d', 'Option 4')}}
                        {{Form::textarea('sub_quiz_d', '', ['class' => 'form-control ckeditor', 'placeholder' => 'Enter Notes Here'])}}
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    {{Form::label('sub_quiz_answer', 'Correct Answer')}}
                    {{Form::text('sub_quiz_answer', '', ['class' => 'form-control ckeditor bg-success', 'placeholder' => 'Enter Notes Here'])}}
                </div>
                <?php $num++; ?>
            </tr>
            

        </table>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
        {{Form::button('Add Question', ['class' => 'btn btn-success', 'id' => 'addButton', 'name' => 'addButton'])}}
    
        <a href="/notes/{{$sub_topics_id}}" class = "btn btn-danger">Back</a>
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
            $('#question_add').append('<tr id="row'+i+'"><td><div class="form-group"><h2><label for="sub_quiz_question">Question '+i+'</label></h2><button type="button" name="remove" id="'+i+'" class="btn btn-danger remove_btn">x</button></div></td></tr>');
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
