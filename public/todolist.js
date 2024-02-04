/*
$(document).ready(function() {
    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });




    // Handle Enter key press on the input field
    $('.tdl-new').keypress(function(event) {

       
        if (event.which === 13) { // Check if the key pressed is Enter (key code 13)
            event.preventDefault(); // Prevent the default behavior of the Enter key (form submission)

            // Get the task from the input field
            var task = $(this).val().trim();

            if (task !== '') {

              //  Livewire.emit('createTask', task);

                //clear the input
                $('.tdl-new').val('');

               
                // Make an Ajax request to save the task
                $.ajax({
                    url: $('#todo_list').data('save-todo'), // Use the data attribute
                    method: 'POST',
                    data: { todo: task },
                    success: function(response) {
                        

                        // Clear the input field
                        $('.tdl-new').val('');

                        $('#todo_list').load("{{ route('_todolist')}}");
                          
                            
                         
                    }, 
                    error: function(error) {
                        // Handle the error
                        console.log('Ajax Error adding task !!',error);
                    }
                });

           
                // try another ajax request to show db current state

                $.ajax({
                 url:$('#todo_list').data('pull-current-state'),
                 method:'GET',
                 data: 'html',

                 success:function(data){
                    $('#todo_list ul ').load(data);
                    console.log("sucess in the new method ");
                 },

                 error:function(error){
                    console.log("erro in the nwe method ");
                 }
                });

            

            } 

           
        } 


    });



    // Handle checkbox change event
    $('input[type="checkbox"]').change(function() {
        var taskId = $(this).data('task-id');
        var status = $(this).is(':checked') ? 1 : 0;

        // Make an Ajax request to update the task status
        $.ajax({
            url: $('#todo_list').data('update-todo-status').replace(':id', taskId), // Use the data attribute
            method: 'POST',
            data: { status: status },
            success: function(response) {
                // Handle the success if needed
                updateTodoList();
                
            },
            error: function(error) {
                // Handle the error
                console.log('Error updating task status:', error);
            }
        });
    });



  $(document).on('taskAdded',function() {
    console.log('Task added.Refresh the todo list');
  });







});


*/