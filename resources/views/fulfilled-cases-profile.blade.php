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
                                                  
                                                        <h4 class="text-primary">NAME : <span class="text-muted"> {{$clients->headofhousehold_firstname}}  {{$clients->headofhousehold_lastname}}</span> </h4>
                                                        
                                                        <h4 class="text-primary">FAMILY ID : <span class="text-muted">  {{$clients -> id}}  </span> </h4>

                                                        <h4 class="text-primary">HOUSEHOLD : <span class="text-muted"> {{$clients -> numofadults + $clients -> numofkids}} </span></h4>
                                                         
                                                        <h4 class="text-primary">ADDRESS 1 : <span class="text-muted">  {{$clients -> address}}  </span></h4>

                                                        <h4 class="text-primary">ADDRESS 2: <span class="text-muted"> {{$clients -> address2}} </span></h4>

                                                        <h4 class="text-primary"> CITY : <span class="text-muted"> {{$clients -> City}} </span></h4>

                                                        <h4 class="text-primary">STATE : <span class="text-muted"> {{$clients -> State}} </span></h4>

                                                        <h4 class="text-primary">ZIP CODE : <span class="text-muted"> {{$clients -> Zip}} </span></h4>
                                                         
                                                        <div class="form-group row">
              <div class="col-lg-8">
      <div class="d-flex align-items-center">
      <h4 class="text-primary mr-2">DECISION: <span class="text-muted"> Approved </span></h4>
      
          </div>
          </div>
         </div>


                                                        
                                                    </div>
                                                </div>

                                                <div class="col-xl-8 col-sm-8 border-right-1 prf-col">
                                                    <div class="profile-email">

                                                    <h4 class="text-primary">AGENCY : <span class="text-muted"> {{$clients -> agency}} </span></h4>

                                                    <h4 class="text-primary">ADVOCATE : <span class="text-muted">{{ $clients -> Advocate_FirstName}}  {{$clients -> Advocate_LastName}} </span></h4>

                                                    <h4 class="text-primary">RECEIVED DATE : <span class="text-muted"> {{\Carbon\Carbon::parse($fullfilled-> first() ->receivedDate)->format('m/d/Y h:i A')}} </span></h4>

                                                    <h4 class="text-primary">MOVE IN DATE : <span class="text-muted">{{\Carbon\Carbon::parse($fullfilled-> first() ->MoveInDate)->format('m/d/Y h:i A')}} </span></h4>

                                                    <h4 class="text-primary">ENTERED DATE : <span class="text-muted"> {{\Carbon\Carbon::parse($fullfilled-> first() ->daterequested)->format('m/d/Y h:i A')}} </span> </h4>

                                                    <h4 class="text-primary">APPROVAL  DATE : <span class="text-muted">{{\Carbon\Carbon::parse($fullfilled-> first() ->approval_date)->format('m/d/Y h:i A')}}</span></h4>

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
                                           
                                            
                                        </ul>


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
                                                       
                                                    </div>
                                                </form>













                                                @foreach ($notes as $note)
                                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                     
                                                        <a class="post-title" >
                                                            <h4>{{ $note -> note}}</h4>
                                                        </a>
                                                        <p> Date posted :  {{\Carbon\Carbon::parse($note-> created_at)->format('m/d/Y ')}}         &nbsp;  &nbsp; &#8204;   Posted by   {{$note -> posted_by}}:</p>  
                                                       
                                                      
                                                    </div>


                                           

   





                                                   
    
                                                    @endforeach
                                                  
                                                 </div>
                                               
                                                </div> 
                                                <br>
                                                <br>
                                                <!-- end row-->
                                                   
                                                </div>
                                            </div>

<!-- profile tab modal-->











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
                                                
                                               
                                                
                                            </tr>
                                            <tr>
                                                
                                                <td>Last Name :</td>
                                                <td><span class="f-w-500 pull-right">{{$clients -> headofhousehold_lastname}}</span>
                                                </td>
                               
                                            </tr>
                                            

                                            <tr>
                                             
                                             <td>Date of Birth :</td>
                                             <td><span class="f-w-500 pull-right">{{$clients -> DOB}}</span>
                                             </td>
                                                                         
                                         </tr>

                                      
                                      

                                      

                                         <tr>
                                             
                                             <td>Gender :</td>
                                             <td>{{$clients -> Gender}}<span class="f-w-500 pull-right"></span></td>
                                             
                                            
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
                   
                                            </tr>
                                            <tr>
                                             
                                                <td>Household Size :</td>
                                                <td><span class="f-w-500 pull-right"></span>{{$clients -> numofadults + $clients -> numofkids}} 
                                                </td>
                                                <td></td>
                                             
                                                 
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
                                            </td>
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
                                               </td>
                                                
                                            </tr>
                                            <tr>
                                                
                                                <td>ADDRESS :</td>
                                                <td><span class="f-w-500 pull-right">{{$clients -> address}}</span>
                                                </td>

                                                <td>
                                                   
                                                </td>
                                            </tr>
                                            <tr>
                                             
                                                <td>EMAIL:</td>
                                                <td><span class="f-w-500 pull-right">{{$clients -> Email}}</span>
                                                </td>
                                              <td></td>
                                                
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

                                                      
                                                <h4 class="table table-striped table-responsive-sm">CASE ID : <span class="text-muted"> {{$fullfilled -> id}} </span></h4>



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
                                       
                                    

                             @foreach($requestorders  as $key => $ro)
                       <tr>
                           @if ($key == 0)
                        <td>{{$fullfilled->id}}</td>
                      <td> {{ explode(' ', $ro->requestedItem)[0] }}</td></td>
                     <td>{{ substr((string)$ro->amountNeeded, 0, 1) }}</td>
                    @else
                    <td></td>
                    <td></td>
                   <td></td>
                    @endif

    
        @if ($key >= 1)
        <td>{{$ro->requestedItem}}</td>
        <td>{{$ro -> amountNeeded}}</td>


        <td>
        @foreach($reev as $item)
                                        @if ($item->requestedItem == $ro->requestedItem)
                                            {{ $item->reev }}
                                        @endif
                                    @endforeach
        </td>
        
        @else
            <td></td>
            <td></td>
            <td></td>
          

        
           
        @endif
        
        
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



                                                <td>{{\Carbon\Carbon::parse($file -> first() -> created_at) ->format('m/d/Y h:i A')}}  </td>

                                                <td>
                                             
                                           
                                            </td>







</td>

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

             

                





@endsection