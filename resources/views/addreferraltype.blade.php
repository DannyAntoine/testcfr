@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')



<div class="content-body">
           

 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ADD REFERRAL TYPE  </h4>
                            </div>
                            <div class="card-body">
                            <form id="referralForm" action = "{{ route ('submit-referral-data') }} " method="POST">
                            @csrf                           

                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Name</label>
                                                                    <input type="text" name="referralname" class="form-control" required>
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label>Description</label>
                                                                    <input type="text" name="referral_description" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            

                                                        
                                                           
                                                            <button class="btn btn-primary" type="submit">Add Referral Type</button>
                                                        </form>
                            </div>
                        </div>
                    </div>

</div>

@include('modal')

<script>
    $(document).ready(function() {
       @if(session('notification'))
       $('#notificationModal').modal('show'); // Show the modal if notification is present
       @endif
    });
</script>




<script>
    $(document).ready(function() {
        // Handle form submission
        $('#referralForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var data = form.serialize();

            // Send an AJAX request to submit the form
            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function(response) {
                    // Show success message in the modal
                    $('#notificationMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#notificationModal').modal('show');
                    // Reload the page after 2 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                },
                error: function(response) {
                    // Show error message in the modal
                    $('#notificationMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    $('#notificationModal').modal('show');
                }
            });
        });
    });
</script>






@endsection
