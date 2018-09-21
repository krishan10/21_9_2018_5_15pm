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
        
   </script>