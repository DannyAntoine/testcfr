@if(session('notification'))
    <div class="modal fade" id="notificationModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notification </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    @if(session('notification.type') === 'success')
                        <div class="alert alert-success">
                            {{ session('notification.message') }}
                        </div>
                    @elseif(session('notification.type') === 'error')
                        <div class="alert alert-danger">
                            {{ session('notification.message') }}
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#notificationModal').modal('show');
        });
    </script>
@endif





<div class="modal fade" id="notificationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- This is where the success or error message will be displayed -->
                <div id="notificationMessage"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>







