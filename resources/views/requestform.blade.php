
@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif




<div class="content-body">







<div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> {{ now()->year }}  Request Form </h4>
                            </div>
                            <div class="card-body">


                            <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                               
                            </div>
                            <div class="card-body">
                                <form action="{{url('requestFormData')}}" id="step-form-horizontal" class="step-form-horizontal" method="POST" >
                                    
                               

                                    <div>
                                        <h4>Client Info</h4>
                                        @csrf
                                        <section >
                                           
                                            
                                            <div class="row">

                                                <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">First Name*</label>
                                                        <input type="text" name="firstName" class="form-control " placeholder="FirstName" required >
                                                    </div>
                                                  </div>
                                                  
                                                 <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Last Name*</label>
                                                        <input type="text" name="lastName" class="form-control" placeholder="LastName" required>
                                                    </div>
                                                 </div>


                            
                                              
                            
                                               <!-- drop dowwn with agency -->
                                               <div class="form-group col-md-4" >
                                                                    <label>Select agency* </label>
                                                                    <select class="form-control" id="inputState" name="agency" required>
                                                                        <option selected="" >Choose...</option>
                                                                        @foreach ($agencyModel as $agency)
                                                                       <option value="{{ $agency['agencyname']}}">{{ $agency['agencyname']}}</option>
                                                                        @endforeach
                                                                        
                                                                    </select>
                                                </div>

                                                 
                                                <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Advocate First Name*</label>
                                                        <input type="text" name="advocatefirstName" class="form-control" placeholder="FirstName" required>
                                                    </div>
                                                  </div>
                                               
                                                 <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Advocate Last Name*</label>
                                                        <input type="text" name="advocatelastName" class="form-control" placeholder="LastName" required>
                                                    </div>
                                                 </div>
                                               
                                               </div> <!--  check here end of 1st row -->
                                                 
                                                   <div class="row"> <!-- start row 2 -->
                                                       
                                                   <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Phone Number*</label>
                                                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter a valid phone number in the format XXX-XXX-XXXX" required>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group form-material" >
                                                        <label class="text-label">Referral Date*</label>
                                                        <input type="text" name="receivedDate" class="form-control" id = "mdate" placeholder="Enter the date case was received" required>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Move In Date*</label>
                                                        <input type="text" name="moveInDate" class="form-control" placeholder="Enter the date the client moves in " required>
                                                    </div>
                                                </div>
                                                

   </div> <!--  check here end of 2nd row -->
                                                
                                                   <div class="row"> <!-- 3rd row -->
                                                    <!-- drop dowwn with gender -->
                                                    <div class="form-group col-md-3">
                                                    <label>Select Gender*</label>
                                                    <select class="form-control" id="inputState" name="Gender" required>
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    </select>
                                                    </div>

                                                    
                                                 

                                                     <!-- drop dowwn with maritial status -->
                                                     <div class="form-group col-md-3">
                                                    <label>Select Maritial Status*</label>
                                                    <select class="form-control" id="inputState" name="MaritalStatus" required>
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Never Married">Never Married</option>
                                                    </select>
                                                    </div>

                                                             

                                                             
                                                   
                                                <div class="form-group col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-label">Date of Birth*</label>
                                                        <input type="text" name="dob" class="form-control" placeholder="DateOfBirth" required>
                                                    </div>
                                                </div>


                                                              <div class="form-group col-md-3">
                                                                  <div class="form-group">
                                                                  <label class="text-label">Email*</label>
                                                                <input type="email" placeholder="something@example.com" name="email" class="form-control" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Please enter a valid email address" required>
                                                                </div>
                                                                </div>

                                                   </div> <!-- end of 3rd row -->

                                                   <div class ="row"> <!-- start of address row -->

                                                       <div class="col-lg-4 mb-4">
                                                         <div class="form-group">
                                                        <label class="text-label"> Address 1*</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="address" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="address 1" required>
                                                        </div>
                                                     </div>   
                                                    </div>

                                                    <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> Address 2*</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="address2" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="address 2" required>
                                                        </div>
                                                     </div>   
                                                </div>
                                                 
                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> City* </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="city" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="City" required>
                                                        </div>
                                                     </div>   
                                                </div>

                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> State*</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="state" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="State" required>
                                                        </div>
                                                     </div>   
                                                </div>

                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> Zip Code*</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="zip" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="zipCode" required>
                                                        </div>
                                                     </div>   
                                                </div>
                                                       
                                                              <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Number of Adults*</label>
                                                        <input type="number" name="numberofAdults" id = "numberofAdults" min ="0"  max ="10" class="form-control" onchange="addAdultFields()" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Number of Children*</label>
                                                        <input type="number" name="numberofChildren" id = "numberofChildren" min ="0" max ="10" class="form-control" onchange="addChildrenFields()" required >
                                                    </div>
                                                </div>
                                                
                                              </div> <!-- end of address row -->

                                    
                                                <div class="row">

                                         

                                                </div>

                                    
                                               
                                        </section>
                                        
                                        
                                        <h4>Family Deographics</h4>
                                        
                                        <section >
                                           
                                        
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Family Deographics </h4>
                            </div>
                            <div class="card-body">
   
                                                
                                                
                                         <div class = "familycontainer">

                                         <div id="adultFormcontainer" ></div>
                                        <div id="children-form-container" ></div>

                                        </div>

                            </div>
                        </div>
                                        </section>
                                        
                                        
                                        <h4>Order Section</h4>
                                        <section>
                                           
                                            
                         
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order Section </h4>
                            </div>
                            <div class="card-body modal-dialog-scrollable" >
                                <div class="table-responsive frm-container" >
                                    
                                    <table class="table table-bordered verticle-middle table-responsive-sm "  >
                                        <thead>
                                            <tr>
                                                <th scope="col">LIVING ROOM</th>
                                                <th scope="col">kITCHEN</th>
                                                <th scope="col">BEDROOM</th>
                                                <th scope="col">MISC</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                 <table class ="table table-bordered verticle-middle table-responsive-sm">
                                                <thead>
                                                 <th scope="col">NEED</th>
                                                 <th scope="col">ITEM</th>
                                                 

                                                </thead>

                                                <tbody>
                                                @foreach ($livingrooms as $livingroom)
                                                <tr>
                                                <td><input type="number" name="livingroomitems[{{$livingroom['id']}}]" id = "livingroomitems" min ="0"   class="form-control"></td>
                                                <td> {{$livingroom['livingroom_item']}} </td> 
                                                </tr>
                                                @endforeach
                                                </tbody>

                                              </table>



                                                </td>



                                                <td>
                                                 <table class ="table table-bordered verticle-middle table-responsive-sm">
                                                 <thead>
                                                 <th scope="col">NEED</th>
                                                <th scope="col">ITEM</th>
                                                </thead>

                                                <tbody>
                                                @foreach ($kitchens as $kitchen)
                                                <tr>
                                                
                                                <td> <input type="number" name="kichenitems[{{$kitchen -> id}}]" id = "_kitchenitems[{{$kitchen -> id}}]" min ="0"  class="form-control"> </td>
                                                <td> {{$kitchen['kitchen_item']}} </td> 
                                                </tr>
                                                @endforeach
                                               
                                                </tbody>

                                                </table>

                                                </td>
                                               




                                                <td>
                                                   <table class ="table table-bordered verticle-middle table-responsive-sm">
                                                   <thead> 
                                                   <th scope="col">NEED</th>
                                                <th scope="col">ITEM</th>
                                               

                                                </thead>
                                                <tbody>
                                                
                                                @foreach ($bedrooms as $bedroom)
                                                <tr>
                                                
                                                <td> <input type="number" name="bedroomitems[{{$bedroom ->id}}]" id = "_bedroomitems[{{$bedroom ->id}}]" min ="0"   class="form-control"> </td>
                                                <td> {{$bedroom['bedroom_item']}} </td> 
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                                </td>

                                                <td>
                                                <table class ="table table-bordered verticle-middle table-responsive-sm"> 
                                                <thead>
                                                <th scope="col">NEED</th>
                                                <th scope="col">ITEM</th>
                                                

                                                </thead>
                                                <tbody>
                                               
                                                @foreach ($miscellaneous as $miscellaneou)
                                                <tr>
                                                <td> <input type="number" name="miscsitems[{{$miscellaneou ->id}}]" id = "_miscsitems[{{$miscellaneou -> id }}]" min ="0"   class="form-control"> </td>
                                                <td> {{ $miscellaneou->misc_item }} </td> 
                                               
                                                </tr>
                                                @endforeach
                                                
                                                </tbody>
                                                </table>
                                                </td>
                                                
                                            </tr>
                                           
                                        
                                        </tbody>
                                    </table>





                                    <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">BABY</th>
                                               <!-- <th scope="col">SMALL APPLIANCE</th> -->
                                                <th scope="col">BEDDING</th>
                                                <th scope="col">BATH</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                 <table class ="table table-bordered verticle-middle table-responsive-sm">
                                                <thead>
                                                <th scope="col">NEED</th>
                                                <th scope="col">ITEM</th>
                                                </thead>

                                                <tbody>
                                                @foreach ($babies as $baby)
                                                <tr>
                                                <td> <input type="number" name="babyitems[{{$baby -> id }}]" id = "babyitems[{{$baby ->id}}]" min ="0"   class="form-control"> </td>
                                                <td> {{ $baby['baby_item'] }} </td> 
                                                </tr>
                                                @endforeach
                                                </tbody>

                                              </table>
                                                </td>






                                                <td>
                                                   <table class ="table table-bordered verticle-middle table-responsive-sm">
                                                   <thead> 
                                                   <th scope="col">NEED</th>
                                                <th scope="col">ITEM</th>
                                                

                                                </thead>
                                                <tbody>
                                                @foreach ($beddings as $bed)
                                                <tr>
                                                <td> <input type="number" name="beddingitems[{{$bed->id}}]" id = "beddingitems_{{$bed -> id }}" min ="0"   class="form-control"> </td>
                                                <td> {{ $bed->bedding_item }} </td> 
                                                
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                                </td>

                                                <td>
                                                <table class ="table table-bordered verticle-middle table-responsive-sm"> 
                                                <thead>
                                                <th scope="col">NEED</th>
                                                <th scope="col">ITEM</th>
                                               

                                                </thead>
                                                <tbody>
                                                @foreach ($baths as $bathe)
                                                <tr>
                                                <td> <input type="number"  name="bathitems[{{ $bathe->id }}]" id="bathitems_{{ $bathe->id }}" min ="0"  class="form-control" > </td>
                                                <td> {{ $bathe->bath_item }} </td> 
                                                
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                                </td>
                                                
                                            </tr>
                                           
                                        
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                         </div>
                   
                                            
                                
                         
 
                       </section>
                           
                
                                        
                                        <h4>  BackOrder </h4>
                                        <section>
                                            
                                        <div id="BackOrder" class="tab-pane fade">
     <div class="container-fluid">
                        <div class="card">
                           
                            <div class="card-body">
                                
                             <h1 > Last step  </h1>   
                        </div>
                   </div>
    
    
</div>
</div>
                                            
                                           
                                                           
                                           

                                        </section>
                                    </div>
                                </form>
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


                                     <script src="increment.js"></script>
                                     <script src="submit.js"></script>
                                   


                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
                                        
                                        <script src="global.min.js"></script>
                                        <script src="quixnav-init.js"></script>
                                        <script src="custom.min.js"></script> 
                                        <script src="jquery.steps.min.js"></script>      
                                        <script src="jquery.validate.min.js"></script> 
                                        <script src="jquery.validate-init.js"></script>
                                        <script src="jquery-steps-init.js"></script> 
                                        

                                      

                                       

 @endsection