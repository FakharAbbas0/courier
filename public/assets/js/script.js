$(document).on('change','#add_question_type',function(){
    let SelectedVlaue = $(this).val();
    if(SelectedVlaue && SelectedVlaue==1){
        $('.ansWers_Div').show();
    }else{
        $('.ansWers_Div').hide();
    }
});
$('#btnAdd_Input').on('click', function() {
    // Add a new input to the container
    $('#inputContainer').append('<input type="text" name="answers[]" class="form-control mb-2" placeholder="Answer">');
});

// Event handler for the Remove Input button
$('#btnRemove_input').on('click', function() {
    // Remove the last input from the container
    $('#inputContainer input:last-child').remove();
});