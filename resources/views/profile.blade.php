
@extends('dashboard-layout')


@section('title','Dashboard')


@section('content')



<div class="content-body">



   <div class="row">
                    <div class="col-lg-12">
                        <div class="profile">
                            <div class="profile-head">
                                
                                <div class="profile-info">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                    <div class="profile-name">
                                                  
                                                        <h4 class="text-primary">NAME : <span class="text-muted"> {{$clients -> headofhousehold_firstname}}  {{$clients -> headofhousehold_lastname}}</span> </h4>
                                                        
                                                        <h4 class="text-primary">FAMILY ID : <span class="text-muted"  id="familyId">  {{$clients -> id}}  </span> </h4>

                                                        <h4 class="text-primary">HOUSEHOLD : <span class="text-muted"> {{$clients -> numofadults + $clients -> numofkids}} </span></h4>
                                                         
                                                        <h4 class="text-primary">ADDRESS 1 : <span class="text-muted"> {{$clients -> address}} </span></h4>

                                                        <h4 class="text-primary">ADDRESS 2: <span class="text-muted"> {{$clients -> address2}}</span></h4>

                                                        <h4 class="text-primary"> CITY : <span class="text-muted"> {{$clients -> City}}</span></h4>

                                                        <h4 class="text-primary">STATE : <span class="text-muted"> {{$clients -> State}} </span></h4>

                                                        <h4 class="text-primary">ZIP CODE : <span class="text-muted"> {{$clients -> Zip}} </span></h4>

                                                        
                                                         
                                                        <div class="form-group row">
  <div class="col-lg-8">
    <div class="d-flex align-items-center">
      <h4 class="text-primary mr-2">DECISION:</h4>
      <select class="form-control" id="decisionDropdown" name="decisionDropdown" onchange="toggleReasonDropdown()" >
        <option value="OPTION">Please select</option>
        <option value="APPROVE">APPROVE</option>
        <option value="DECLINE">DECLINE</option>
      </select>
    </div>
  </div>
</div>


                                                        
                                                    </div>
                                                </div>

                                                <div class="col-xl-8 col-sm-8 border-right-1 prf-col">
                                                    <div class="profile-email">

                                                   
                                                    <h4 class="text-primary">AGENCY : <span class="text-muted"> {{$clients -> agency}} </span></h4>

                                                    <h4 class="text-primary">ADVOCATE : <span class="text-muted">{{ $clients -> Advocate_FirstName}}  {{$clients -> Advocate_LastName}} </span></h4>

                                                    <h4 class="text-primary">RECEIVED DATE : <span class="text-muted">{{\Carbon\Carbon::parse($pendingcases['receivedDate']) ->format('m/d/Y ') }}</span></h4>

                                                    <h4 class="text-primary">MOVE IN DATE : <span class="text-muted"> {{\Carbon\Carbon::parse($pendingcases['MoveInDate']) ->format('m/d/Y ') }} </span></h4>

                                                    <h4 class="text-primary">ENTERED DATE : <span class="text-muted"> {{\Carbon\Carbon::parse($pendingcases-> first() ->daterequested)->format('m/d/Y h:i A')}} </span> </h4>

                                                    <h4 class="text-primary">PHONE : <span class="text-muted">{{ $clients -> phone}}  </span></h4>

                                                    
                               
                                                     
                                                    <div class="form-group row">
  <div class="col-lg-8" id="reasonDropdown" style="display: none;">
    <div class="d-flex align-items-center">
      <h4 class="text-primary mr-2">REASON:</h4>
      <select class="form-control" id="val-skill" name="val-skill">
            <option value="">Please select</option>
            <option value="html">Previously Helped</option>
            <option value="css">Not Eligible</option>
        </select>
    </div>
  </div>
</div>


                                                         
                                                       
                                                        <p> </p>
                                                    </div>
                                                </div>



                                             
                                               

                                               




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>



             
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#overview" data-toggle="tab" class="nav-link active show">Overview</a></li>  
                                            <li class="nav-item"><a href="#profile" data-toggle="tab" class="nav-link">Profile</a></li>
                                            <li class="nav-item"><a href="#cases" data-toggle="tab" class="nav-link">Cases</a></li>
                                            <li class="nav-item"><a href="#Uploads" data-toggle="tab" class="nav-link">Uploads</a></li>
                                          
                                            <li class="nav-item"><a href="#ClientData" data-toggle="tab" class="nav-link">Client Data</a></li>
                                           
                                            
                                        </ul>


                                        <!-- ==============================================================================================-->
    <!-- Modal this modal will be used for editing case referal type  -->
    <div class="modal fade" id="casereferalModal" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true" >
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Select Case Referal Type</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                


                                                <div class="modal-body">
                                                <form id="checkboxForm" action="/save-checkboxes" method="POST">
                                                    @csrf
                                                   
                                                   @foreach($referraltype as $type) 
                                                   <input type="hidden" name="family_id" value="{{ $clients->id }}">
                                                <input type="checkbox" name="options[]" value="{{$type -> id}}" id="options-{{$type->id}}" >
                                                <span style="margin-left: 10px;">{{ $type->referal_description }}</span>
                                                <br>
                                                     @endforeach                        
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" >Save changes</button>
                                                </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
<!-- ====================================================================================================================================================-->
                                        <div class="tab-content">
                                            <div id="overview" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">

                                                 <div class ="row">

                       <div class ="col-lg-5"> <!-- should be on the left-->                        
                        <div class="card">
                            <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                            <tbody>

                           
                                            <tr>
                                                
                                                <td>Case referal type:</td>
                                                @foreach($crt as $type)
                                                <td> {{$type -> CaseReferalType }}</td>
                                                @endforeach
                                               <td>
                                               @include('modal')
                                                <a href="#" class="edit-link" data-toggle="modal" data-target="#casereferalModal">
                                               
                                                   
                                                   
    <i class="bi bi-pencil-fill bluepen"></i>
</a> </td>
                                                


                                          
                                            </tr>
                            </tbody>
                             
                            </table>

                            </div>
                            </div>
                        </div>
                    </div> <!-- end of left -->


                                                <div class=" col-lg-7 "> <!-- should be on the right-->

                                                <form action = "{{ route ('submit-post-data') }} " method="POST">
                                                @csrf 
                                                    <div class="post-input">
                                                        <!-- please dont forget to reveiw the foring line to get the froegin key update -->
                                                    <input type="hidden" name="family_id" value="{{ $clients->id }}">
                                                        <textarea name="textarea" id="textarea" cols="30" rows="5"   class="form-control bg-transparent" placeholder="Please type what you want...." title="Please enter a note" required></textarea> 
                                                        
                                                       
                                                        
                                                        <button class="btn btn-primary" type="submit">Add Note</button>
                                                    </div>
                                                </form>













                                                @foreach ($notes as $note)
                                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                        <img src="images/profile/8.jpg" alt="" class="img-fluid">
                                                        <a class="post-title" >
                                                            <h4>{{ $note -> note}}</h4>
                                                        </a>
                                                        <p> Date posted :  {{\Carbon\Carbon::parse($note-> created_at)->format('m/d/Y ')}}         &nbsp;  &nbsp; &#8204;   Posted by   {{$note -> posted_by}}:</p>  
                                                       
                                                        <div class="form-row">
                                                     
                                                   
                                                                    
                                                                 <!-- this edit button in this form is to open the note in the modal textarea -->
                                                                    <form method="PUT" action="{{route('edit-note', ['note_id' => $note ->note_id]) }}">
                                                                        @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="note_content" value="{{ $note->note }}"> <!--  important pass back -->
                                                                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#noteModal-{{ $note->note_id }}" 
                                                                    data-note-id="{{ $note -> note_id }}" data-note-url="{{ route('edit-note-form', ['note_id' => $note->note_id]) }}">
                                                                    <span class="mr-3"><i class="fa fa-reply"></i></span>Edit
                                                                    </button>
                                                                    </form>

                                                                    &nbsp;
                                                                    <!-- =====================================-->
                                                                    <form method="POST" action="{{ route('delete-note', ['note_id' => $note->note_id]) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger delete-note" data-note-id="{{ $note->note_id }}">
                                                                    <span class="mr-3"><i class="fa fa-reply"></i></span>Delete
                                                                    </button>
                                                                    </form>
                                                                     
                                                        </div>
                                                    </div>


                                           

     <div class="modal fade" id="noteModal-{{ $note->note_id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Notes  nt wrking</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="saveEditsForm-{{ $note->note_id }}" name = "saveEditsForm" action="{{ route('saveEdits', ['note_id' => $note->note_id]) }}">
                @method('PUT')
                    @csrf
                    <input type="hidden" name="note_id" value="{{ $note->note_id }}">
                    <textarea name="note_content" id="noteContent" cols="30" rows="5" class="form-control bg-transparent" title="Please edit your note" required></textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-note-id="{{ $note->note_id }}">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- read notes -->
 
<script>

    // pulls the text to the modal 
    $(document).ready(function() {
        $('#noteModal-{{ $note->note_id }}').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var noteContent = button.closest('form').find('input[name="note_content"]').val();
            var modal = $(this);
            
            // Populate the textarea with the note content
            modal.find('#noteContent').val(noteContent);
        });
    });
</script>



                                                   
    
                                                    @endforeach
                                                  
                                                 </div>
                                               
                                                </div> 
                                                <br>
                                                <br>
                                                <!-- end row-->
                                                    <div class="text-center mb-2"><a href="{{route ('pending-case') }}" class="btn btn-primary">Return to pending case</a></div>
                                                </div>
                                            </div>

<!-- profile tab modal-->



                                           
<div class="modal fade" id="ProfileModal{{$clients->id}}" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="EditProfileRecords{{$clients->id}}" name="EditProfileRecords" action="{{route ('SaveProfileEdits', ['id' => $clients -> id])}}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="field_identifier" id="fieldIdentifier{{$clients->id}}" value="">
                    <textarea name="profilecanvas" id="profileCanvas{{$clients->id}}" cols="30" rows="5" class="form-control bg-transparent" title="Please edit the Profile" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-note-id="" data-client-id="{{ $clients->id }}" >Save Changes</button>  
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.edit-link', function() {
            var identifier = $(this).data('identifier');
            var fieldIdentifierId = '#fieldIdentifier{{$clients->id}}';

            var content = $(this).data('content');
            var modalId = $(this).data('target');
            var textareaId = modalId + ' textarea[name="profilecanvas"]';
            $(textareaId).val(content);

            $(fieldIdentifierId).val(identifier);
            $(modalId).data('field-identifier', identifier);
        });
    });
</script>

<!-- ==========================-->
@foreach($families as $family)
<div class="modal fade" id="FamilyDemographicsModel{{$family -> id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route ('SaveFamDemoEdits', ['id' => $family -> id])}}" method="POST" enctype="multipart/form-data"  id="FamilyDemographics{{$family -> id }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="identifier" name="identifier" value="{{$family->id}}">

                        <div class="form-group">
                            <label for="editName">First Name</label>
                            <input type="text" name="name" class="form-control" id="editName" placeholder="First Name"  value="{{$family->firstname}}" required>
                        </div>
                        <div class="form-group">
                            <label for="editSurname">Last Name</label>
                            <input type="text" name="surname" class="form-control" id="editSurname" placeholder="Last Name" value="{{$family->lastname}}" required>
                        </div>
                        <div class="form-group">
                            <label for="editAge">Age</label>
                            <input type="number"  name="age" class="form-control" id="editAge" value="{{$family->age}}" required>
                        </div>
                        <div class="form-group">
                            <label for="editPhone">Gender </label>
                            <input type="text"  name="gender" class="form-control" id="editGender" value="{{$family->gender}}" required>
                        </div>
                        
                        <div class="modal-footer">
                            <a  class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <button type="submit"  id="saveModalButton" class="btn btn-primary" >Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- pass existing data to the above modal-->
<script>
 $(document).ready(function() {
  $(document).on('click', '.edit-famdemo', function() {
    var identifier = $(this).data('identifier');
    var modalId = $(this).data('target');
    var familyId = $(this).data('familyid');

    var firstName = $(modalId).find('input[name="name"]').val();
    var lastName = $(modalId).find('input[name="surname"]').val();
    var age = $(modalId).find('input[name="age"]').val();
    var gender = $(modalId).find('input[name="gender"]').val();

    $(modalId + ' input[name="identifier"]').val(identifier.toLowerCase());

    $(modalId).find('input[name="name"]').val(firstName);
    $(modalId).find('input[name="surname"]').val(lastName);
    $(modalId).find('input[name="age"]').val(age);
    $(modalId).find('input[name="gender"]').val(gender);

    

        
  });
});

</script>



                         <div id="profile" class="tab-pane fade">
                          <div class="col-lg-12">
                              <div class="card">
                             <div class="card-header">
                                <h4 class="card-title"><span class="text-primary mb-4"> Personal Information</span></h4>
                              </div>
                             <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                     
                                        <tbody>
                                            <tr>
                                                
                                                <td>First Name :</td>
                                                <td><span class="f-w-500 pull-right">{{$clients -> headofhousehold_firstname}}</span></td>
                                                
                                                <td>
                                           
                                                <a href="#" class="edit-link" data-toggle="modal"  data-target="#ProfileModal{{$clients->id}}" data-content="{{$clients->headofhousehold_firstname}}"  data-identifier="headofhousehold_firstname">
    <i class="bi bi-pencil-fill bluepen"></i>
</a> </td>
                                                
                                            </tr>
                                            <tr>
                                                
                                                <td>Last Name :</td>
                                                <td><span class="f-w-500 pull-right">{{$clients -> headofhousehold_lastname}}</span>
                                                </td>
                               <td>
                                              
                                              <a href="#" class="edit-link" data-toggle="modal"  data-target="#ProfileModal{{$clients->id}}" data-content="{{$clients->headofhousehold_lastname}}" data-identifier="headofhousehold_lastname">
    <i class="bi bi-pencil-fill bluepen"></i>
</a> </td>
                                            </tr>
                                            

                                            <tr>
                                             
                                             <td>Date of Birth :</td>
                                             <td><span class="f-w-500 pull-right">{{$clients -> DOB}}</span>
                                             </td>
                                                                            <td>
                                             
                                                <a href="#" class="edit-link" data-toggle="modal" data-target="#ProfileModal{{$clients->id}}" data-content ="{{$clients -> DOB}}" data-identifier= "DOB"  data-dob-client-id="{{$clients->DOB}}" >
    <i class="bi bi-pencil-fill bluepen"></i>
</a> </td>
                                         </tr>

                                      
                                      

                                      

                                         <tr>
                                             
                                             <td>Gender :</td>
                                             <td>{{$clients -> Gender}}<span class="f-w-500 pull-right"></span></td>
                                             
                                             <td>
                                            <a href="#" class="edit-link" data-toggle="modal" data-target="#ProfileModal{{$clients->id}}" data-content ="{{$clients -> Gender}}" data-identifier="Gender"  >
                                            <i class="bi bi-pencil-fill bluepen"></i>
                                            </a> 
                                            </td>
                                         </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- new-->


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="text-primary mb-4"> FAMILY DEMOGRAPHICS  </span></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                     
                                        <tbody>
                                            <tr>
                                                
                                                <td>Head of Household:</td>
                                                <td><span class="f-w-500 pull-right">{{$clients -> headofhousehold_firstname}}  {{$clients -> headofhousehold_lastname}}</span></td>
                                                <td></td>
                                                
                                            </tr>

                                            <tr>
                                                
                                                <td>Marital Status: </td>
                                                <td>{{ $clients -> MaritalStatus}}<span class="f-w-500 pull-right"></span>
                                                </td>
                                                <td>
                                              @include('modal')
                                                <a href="#" class="edit-link" data-toggle="modal" data-target="#ProfileModal{{$clients->id}}" data-content ="{{$clients -> MaritalStatus}}" data-identifier=" MaritalStatus">
    <i class="bi bi-pencil-fill bluepen"></i>
</a> </td>
                                            </tr>
                                            <tr>
                                             
                                                <td>Household Size :</td>
                                                <td><span class="f-w-500 pull-right"></span>{{$clients -> numofadults + $clients -> numofkids}} 
                                                </td>
                                                <td>
                                             
                                                 </td>
                                            </tr>

                                            <tr>
                                             
                                             <td>Number of Adults in Household:</td>
                                             <td><span class="f-w-500 pull-right">{{$clients -> numofadults}}</span>
                                             </td>
                                             <td>
                                            </td>
                                         </tr>

                                         <tr>
                                             
                                             <td>Number of Children in Household:</td>
                                             <td><span class="f-w-500 pull-right">{{$clients -> numofkids}}</span>
                                             </td>
                                             <td>
                                             </td>
                                         </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                         


                            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title"><span class="text-primary mb-4"> CHILDREN </span></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Age</th>
                                                <th>Gender </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                         @foreach ($lessThan18 as $age => $records)
                                         @foreach ($records as $record)
                                        <tr>
                                        <td>{{ $record->firstname }}</td>
                                        <td>{{ $record->lastname }}</td>
                                        <td>{{ $record->age }}</td>
                                        <td>{{ $record->gender }}</td>
                                        <td>
                                              @include('modal')
                                                <a href="#" class="edit-famdemo" data-toggle="modal" data-target="#FamilyDemographicsModel{{$record->id}}"  data-familyid="{{$record->id}}">
    <i class="bi bi-pencil-fill bluepen"></i>
</a> </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title"><span class="text-primary mb-4"> ADULTS </span></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Age</th>
                                                <th>Gender </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                         @foreach ($greaterThan18 as $age => $records)
                                         @foreach ($records as $record)
                                        <tr>
                                        <td>{{ $record->firstname }}</td>
                                        <td>{{ $record->lastname }}</td>
                                        <td>{{ $record->age }}</td>
                                        <td>{{ $record->gender }}</td>
                                        <td>
                                              @include('modal')
                                                <a href="#" class="edit-link" data-toggle="modal" data-target="#FamilyDemographicsModel{{$record->id}}" data-identifier="{{ $record->id }}" data-familyid="{{$record->id}}">
    <i class="bi bi-pencil-fill bluepen"></i>
</a> </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                     </div>



                     </div>
                     
                    </div>

                    
                    <div class="col-lg-12">
                              <div class="card">
                             <div class="card-header">
                                <h4 class="card-title"><span class="text-primary mb-4"> CONTACT INFORMATION</span></h4>
                              </div>
                             <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                     
                                        <tbody>
                                            <tr>
                                                
                                                <td>PHONE NUMBER:</td>
                                                <td><span class="f-w-500 pull-right">{{ $clients -> phone }}</span></td>
                                                <td>
                                                <a href="#" class="edit-link" data-toggle="modal" data-target="#ProfileModal{{$clients->id}}" data-content ="{{$clients -> phone}}" data-identifier="phone">
                                                    <i class="bi bi-pencil-fill bluepen"></i></td>
                                                
                                            </tr>
                                            <tr>
                                                
                                                <td>ADDRESS :</td>
                                                <td><span class="f-w-500 pull-right">{{$clients -> address}}</span>
                                                </td>

                                                <td>
                                                    <a href="#" class="edit-link"  data-field-id="#profileCanvas{{$clients->id}}" data-toggle="modal" data-target="#ProfileModal{{$clients->id}}" data-content ="{{$clients -> address}}" data-identifier="address"><i class="bi bi-pencil-fill bluepen"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                             
                                                <td>EMAIL:</td>
                                                <td><span class="f-w-500 pull-right">{{$clients -> Email}}</span>
                                                </td>

                                                <td><a href="#" class="edit-link" data-field-id="#profileCanvas{{$clients->id}}" data-toggle="modal" data-target="#ProfileModal{{$clients->id}}" data-content ="{{$clients -> Email}}" data-identifier="Email"><i class="bi bi-pencil-fill bluepen"></i></td>
                                            </tr>
                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            </div>
</div>


                    </div>
                                           
                        <div id="cases" class="tab-pane fade">
                                                 <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">CASE</h4>

                                                      
                                                <h4 class="table table-striped table-responsive-sm">CASE ID : <span class="text-muted"> {{$pendingcases -> id}} </span></h4>



                                                <div class="col-lg-12">
                         <div class="card">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                
                                                <th>CASE ID</th>
                                                <th>CATEGORY</th>
                                                <th>CATEGORY TOTAL</th>
                                                <th>REQUEST ORDER</th>
                                                <th>QUANTITY </th>
                                                <th>REEV </th>
                                                
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
     
        <tr>
            <td rowspan="{{ count($requestorders) }}">{{ $pendingcases->id }}</td>
            <td>{{ $requestorders[0]->category }}</td>
            <td>{{ $requestorders[0]->categoryTotal }}</td>
            <td>{{ explode(' ', $requestorders[0]->requestedItem)[0] }}</td>
            <td>{{ substr((string)$requestorders[0]->amountNeeded, 0, 1) }}</td>
            <td><input type="number" name="reev[]" id="reev" data-request-order-id="{{ $requestorders[0]->id }}" min="0" class="form-control"></td>
        </tr>
        {{-- Loop through remaining categories --}}
        @foreach ($requestorders as $key => $ro)
            @if ($key > 0)
                <tr>
                    <td>{{ $ro->category }}</td>
                    <td>{{ $ro->categoryTotal }}</td>
                    <td>{{ $ro->requestedItem }}</td>
                    <td>{{ $ro->amountNeeded }}</td>
                    <td><input type="number" name="reev[]" id="reev" data-request-order-id="{{ $ro->id }}" min="0" class="form-control"></td>
                </tr>
            @endif
        @endforeach
    </tbody>
                                    </table>
                                </div>

                            </div>
                            <button id="submitButton" class="btn btn-primary" data-case-id="{{$pendingcases->id}}"  type="submit" onclick="submitForm()">Complete Order</button>

                        </div>
                     </div>
                                                    



                                                      
                                                     
                                                    </div>
                                                </div> 
                                            </div>





  
                                            





                                            <div id="Uploads" class="tab-pane fade">


                                            <div class="container-fluid">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                
                                                <th>File Name </th>
                                                <th>Date Created</th>
                                                
                                                <th>Edit </th>
                                                <th>Delete </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                     
                                       @foreach($files as $file)
                                            <tr>
                                                
                                            <td>
    <a href="{{ asset('storage/uploads/' . $file->filename) }}" download="{{ $file->filename }}">
        {{ $file->filename }}
    </a>
</td>



                                                <td>{{$file ->created_at}}  </td>

                                                <td>
                                             
                                            <a href="#" class="edit-link" data-toggle="modal" data-target="#editDoc">
                                            <i class="bi bi-pencil-fill bluepen"></i>
                                             </a> 
                                            </td>







                                            <!-- Modal -->
                                            <div class="modal fade" id="editDoc" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="basicModalLabel">Edit Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method="POST" id="saveNewDocumentName-{{ $file->id }}" name = "saveNewDocumentname" action="{{ route('saveNewDocumentName', ['id' => $file->id]) }}">
             @method('PUT')
             @csrf

              <textarea name="filename" id="filename" cols="30" rows="5" class="form-control bg-transparent" title="Please edit your filename" required> {{$file-> filename}}</textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-note-id="{{ $note->note_id }}">Save Changes</button>
              </div>
          </form>
          </div>
    </div>
</div>





<td>
<form action="{{ route('deleteFile', ['id' => $file->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this file?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-link"><i class="bi bi-trash red"></i></button>
</form>

</td>

                                            </tr>
                                      
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                                             
    <form action="{{ route('uploadFile') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
      @csrf
      <input type="hidden" name="family_id" value="{{ $clients->id }}">
<!--  shows a message as to if the file upload or not -->
      @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif




   <div class="form-group">
      <label for="file">Select File:</label>
      <input type="file" name="file" id="file" style="display: none;">
   </div>

   <div>
      <span id="fileName"></span>
   </div>

   <button  class= " btn btn-primary " type="button" id="uploadBtn">Upload Evidence</button>
</form>

<script>

    
   document.getElementById('uploadBtn').addEventListener('click', function() {
      document.getElementById('file').click();
   });

   document.getElementById('file').addEventListener('change', function() {
      var fileInput = document.getElementById('file');
      var fileNameSpan = document.getElementById('fileName');

      if (fileInput.files.length > 0) {
         fileNameSpan.textContent = fileInput.files[0].name;
      } else {
         fileNameSpan.textContent = '';
      }

      document.getElementById('uploadForm').submit();
   });
</script>


                                               </div> 



<div id="ClientData" class="tab-pane fade">
      <div class="container-fluid">
                        <div class="card">
                           
                            <div class="card-body">
                                <h5> this is an official document print for your record </h5>
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr> 
                                                <th>File Name </th>
                                                <th>Action </th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        @foreach ($pdfDoc as $document)
                                        <tr>
                                        <td> <iframe src="{{ route('viewPdf', $document->id) }}" width="100%" height="600px"></iframe></td>
                                        <td> delete </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
  
                            </div>
                        </div>
     </div>
    
    
</div>



                                              
                                               


                                           







                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

             

                

<script>

    
function showNotificationModal(type, message) {
  const modal = $('#notificationModal');
  const notificationMessage = modal.find('.modal-body');

  // Set the message and color based on the notification type
  //notificationMessage.text(message);
  if (type === 'success') {
    notificationMessage.html('<div class="alert alert-success">' + message + '</div>');
  } else {
    notificationMessage.html('<div class="alert alert-danger">' + message + '</div>');
  } 

  // Show the modal
  modal.modal('show');
}




function submitForm() {
  $(document).ready(function() {
    $('#submitButton').click(function(e) {
      e.preventDefault();

      // Get the form values
      const decision = $('#decisionDropdown').val();
      const reason = $('#val-skill option:selected').text();
      const caseId = $(this).data('case-id');

      // Prepare the data to be sent
      const formData = {
        decision: decision,
        reason: reason,
        caseID: caseId,
        receivedQuantities: $('input[name="reev[]"]').map(function() {
          const familyId = document.getElementById('familyId').textContent;
          const requestOrderId = $(this).data('request-order-id');
          const receivedQuantity = $(this).val();
          const requestedItem = $(this).closest('tr').find('td:eq(3)').text().trim();
          return {
            familyId: familyId,
            requestOrderId: requestOrderId,
            receivedQuantity: receivedQuantity,
            requestedItem: requestedItem
          };
        }).get()
      };

      const csrfToken = $('meta[name="csrf-token"]').attr('content');
      const headers = {
        'X-CSRF-TOKEN': csrfToken
      };

      if (decision === 'APPROVE') {
        // Perform the AJAX request for fulfillment
        $.ajax({
          url: '/fulfillment',
          type: 'POST',
          data: formData,
          dataType: 'json',
          headers: headers,

          success: function(response) {
            console.log('Form submission successful:', response);
            if (response.success) {
              showNotificationModal('success', 'Case approved');
              // Additional logic for fulfilled cases
              window.location.href = '/dashboard';
            } else {
              showNotificationModal('error', response.message);
            }
          },
          error: function(error) {
            console.error('Form submission failed:', error);
            showNotificationModal('error', 'An error occurred');
          }
        });
      } else if (decision === 'DECLINE') {
        // Perform the AJAX request for decline
        $.ajax({
          url: '/decline',
          type: 'POST',
          data: formData,
          dataType: 'json',
          headers: headers,

          success: function(response) {
            console.log('Decline request successful:', response);
            // Handle success response for decline request here
            window.location.href = '/dashboard';
          },
          error: function(error) {
            console.error('Decline request failed:', error);
            // Handle error response for decline request here
          }
        });
      } else {
        // Handle cases where the decision is neither 'Approved' nor 'declined'
        console.error('Invalid decision:', decision);
        showNotificationModal('error', 'Invalid decision');
      }
    });
  });
}




    // the following function toggles the decision and reason dropdown
    // if the user select decline then reason drop down will appear
    //if the user select approve the the reason dropdown will disappear
     function toggleReasonDropdown() {
      var decisionDropdown = document.getElementById("decisionDropdown");
      var reasonDropdown = document.getElementById("reasonDropdown");
    

      // Check if "DECLINE" is selected
      if (decisionDropdown.value === "DECLINE") {
        // Show the reason dropdown
        reasonDropdown.style.display = "block";

     
      } else {
        // Hide the reason dropdown
        reasonDropdown.style.display = "none";
     
      }
    }

</script>




<!-- this js function is for the referral checkboxes  -->
<!-- this js function is for the referral checkboxes  -->
<script>
    function saveChanges() {
        var selectedCheckboxes = [];

        // Get all the checked checkboxes
        $("input[name='options[{{ $family_id }}][]']:checked").each(function() {
            selectedCheckboxes.push($(this).val());
        });

        // Send the selected checkbox values to the backend using AJAX
        $.ajax({
            url: '/saveCheckboxes', // Replace with your backend endpoint
            method: 'POST',
            data: {
                checkboxes: selectedCheckboxes,
                family_id: {{ $family_id }}
            },
            success: function(response) {
                // Handle the success response
                console.log(response);
            },
            error: function(error) {
                // Handle the error response
                console.log(error);
            }
        });
    }
</script>

<!-- this profilevalidation is preventing delte and edite recheck the code-->

<!-- <script src="profilevalidation.js"></script> -->

<script src="3.6.3jquery.min.js"></script>



@endsection