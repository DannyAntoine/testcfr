// add an event handeler to the submit button on the multi step form

/*$(document).ready(function() {

  
    // Listen for click event on the "Finish" button
    $('#step-form-horizontal').on('click', 'a[href="#finish"]', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        alert("submit button on multi step form pushed");
        // Submit the form programmatically
        $('#step-form-horizontal').submit();
    });
}); */

$(document).ready(function() {
    // Listen for click event on the "Finish" button
    $('#step-form-horizontal').on('click', 'a[href="#finish"]', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        
        // Create a submit button
        var submitButton = $('<button type="submit">vendetta</button>');
        
        // Append the submit button to the form
        $('#step-form-horizontal').append(submitButton);
        
        // Trigger the click event on the submit button
        submitButton.click();
    });
});

