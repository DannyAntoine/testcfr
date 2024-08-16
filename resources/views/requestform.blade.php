
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
                                                        <input type="text" name="firstName" class="form-control " placeholder="FirstName"  >
                                                    </div>
                                                  </div>
                                                  
                                                 <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Last Name*</label>
                                                        <input type="text" name="lastName" class="form-control" placeholder="LastName" >
                                                    </div>
                                                 </div>


                                              
                            
                                               <!-- drop dowwn with agency -->
                                               <div class="form-group col-md-4" >
                                                                    <label>Select agency* </label>
                                                                    <select class="form-control" id="inputState" name="agency" >
                                                                        <option selected="" >Choose...</option>
                                                                        @foreach ($agencyModel as $agency)
                                                                       <option value="{{ $agency['agencyname']}}">{{ $agency['agencyname']}}</option>
                                                                        @endforeach
                                                                        
                                                                    </select>
                                                </div>

                                                 
                                                <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Advocate First Name*</label>
                                                        <input type="text" name="advocatefirstName" class="form-control" placeholder="FirstName" >
                                                    </div>
                                                  </div>
                                               
                                                 <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Advocate Last Name*</label>
                                                        <input type="text" name="advocatelastName" class="form-control" placeholder="LastName" >
                                                    </div>
                                                 </div>
                                               
                                               </div> <!--  check here end of 1st row -->
                                                 
                                                   <div class="row"> <!-- start row 2 -->
                                                       
                                                   <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Phone Number*</label>
                                                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter a valid phone number in the format XXX-XXX-XXXX" oninput="formatPhoneNumber(this)" >
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group form-material" >
                                                        <label class="text-label">Referral Date*</label>
                                                        <input type="date" name="receivedDate" class="  form-control" id="receivedDate" placeholder="Enter the date case was received"  >
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Move In Date*</label>
                                                        <input type="date" name=" moveInDate"   class="form-control" id="moveInDate" >
                                                    </div>
                                                </div>
                                                

   </div> <!--  check here end of 2nd row -->
                                                
                                                   <div class="row"> <!-- 3rd row -->
                                                    <!-- drop dowwn with gender -->
                                                    <div class="form-group col-md-3">
                                                    <label>Select Gender*</label>
                                                    <select class="form-control" id="inputState" name="Gender" >
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    </select>
                                                    </div>

                                                    
                                                 

                                                     <!-- drop dowwn with maritial status -->
                                                     <div class="form-group col-md-3">
                                                    <label>Select Maritial Status*</label>
                                                    <select class="form-control" id="inputState" name="MaritalStatus" >
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
                                                        <input type="date" name="dob" class=" form-control" placeholder="DateOfBirth" id="dob">
                                                    </div>
                                                </div>


                                                              <div class="form-group col-md-3">
                                                                  <div class="form-group">
                                                                  <label class="text-label">Email*</label>
                                                                <input type="email" placeholder="something@example.com" name="email" class="form-control" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Please enter a valid email address" >
                                                                </div>
                                                                </div>

                                                   </div> <!-- end of 3rd row -->

                                                   <div class ="row"> <!-- start of address row -->

                                                       <div class="col-lg-4 mb-4">
                                                         <div class="form-group">
                                                        <label class="text-label"> Address 1*</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="address" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="address 1" >
                                                        </div>
                                                     </div>   
                                                    </div>

                                                    <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> Address 2*</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="address2" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="address 2" >
                                                        </div>
                                                     </div>   
                                                </div>
                                                 
                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> City* </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="city" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="City" >
                                                        </div>
                                                     </div>   
                                                </div>

                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> State*</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="state" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="State" >
                                                        </div>
                                                     </div>   
                                                </div>

                                                <div class="col-lg-4 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label"> Zip Code*</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"  name="zip" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="zipCode" >
                                                        </div>
                                                     </div>   
                                                </div>
                                                       
                                                              <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Number of Adults*</label>
                                                        <input type="number" name="numberofAdults" id = "numberofAdults" min ="0"   class="form-control" onchange="addAdultFields()" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Number of Children*</label>
                                                        <input type="number" name="numberofChildren" id = "numberofChildren" min ="0"  class="form-control" onchange="addChildrenFields()" required >
                                                    </div>
                                                </div>
                                                
                                              </div> <!-- end of address row  -->

                                            

                                    
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
   
                                                
                                                
                                         <div class = "familycontainer family-demo-scrollbar">

                                         <div id="adultFormcontainer" ></div>
                                        <div id="children-form-container" ></div>

                                        </div>

                            </div>
                        </div>
                                        </section>
                                        
                                        
                                      
             <h4>Order Section</h4>
<section>
  <div class="row">
     <div class="col-12">
           <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order Section</h4>
                            </div>          
                            <div class="card-body family-demo-scrollbar">
                                <div class="table-responsive ">
                                <table id="example" class="display" style="min-width: 845px;">
                                 <thead>
                                 <tr>
                                    <th>AVALIABILITY</th>
                                    <th>STATUS</th>
                                    <th>CATEGORY</th>
                                    <th>ITEM NAME</th>
                                    <th>REQUESTED</th>
                                    
                                  </tr>
                                </thead>
                                  <tbody>
                               @foreach($fetchInventoryData as $data)
                               @foreach($data->products as $product)
                               @foreach($product->inventories as $inventory)
                              <tr>
                                <td>{{$inventory->avaliability}}</td>
                                <td style="color: {{ $inventory->status === 'IN STOCK' ? 'green' : 'red' }};">{{ $inventory->status }}</td>

                                

                                <td>{{ $data->category_name }}</td>
                               
                                <td>{{ $product->product_name }}</td>
                                
                                <td>
                              
                                  <!--  <input type="number" name="" id="" min="0" class="form-control"> -->
                                  <input type="number" name="quantity[{{$product['id']}}]" id = "quantity" min="0" class="form-control"  value="{{ old('quantity.' . $product['id']) }}">
                                  
                                </td>
                               

                                
                              </tr>
                              @endforeach
                               @endforeach
                               @endforeach
                               </tbody>

                              <tfoot>
                                            <tr>
                                                <th>AVALIABILITY</th>
                                                <th>STATUS</th>
                                                <th>CATEGORY</th>
                                                <th>ITEM NAME</th>
                                                <th>REQUESTED</th>
                                                

                                            </tr>
                                        </tfoot>
                                    </table>
                                    <br><br>
                                </div>
                            </div>
             </div>
        </div>
    </div>
</section>


 



                                        
<h4>  Review </h4>
<section>
   <div>
      <div class ="col-12">  
           <div class ="card">
                    <div class="card-header">
                        <h4 class="card-title">Review Section</h4>
                    </div>                                       
                 <div id="BackOrder" class="">
                
                        
                           
                            <div class="card-body">
                                
                             <h3> this will be for a review before submit   </h3>   
                       
                             </div>
    
    
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

                          
                                        
                                        
 <!--<script src="increment.js"></script> 
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
                                        <script src="jquery.dataTables.min.js"></script>
                                        
                                        <script src="datatables.init.js"></script>
                                        <script src="jquery-steps-init.js"></script>    -->                              
                                        
                                      
                                       
                                        <script>
        function formatPhoneNumber(input) {
            // Remove all non-digit characters
            const cleaned = input.value.replace(/\D/g, '');
            // Define the parts of the phone number
            const part1 = cleaned.substring(0, 3);
            const part2 = cleaned.substring(3, 6);
            const part3 = cleaned.substring(6, 10);
            // Format the phone number
            if (cleaned.length > 6) {
                input.value = `${part1}-${part2}-${part3}`;
            } else if (cleaned.length > 3) {
                input.value = `${part1}-${part2}`;
            } else if (cleaned.length > 0) {
                input.value = part1;
            }
        }
    </script>                         
                                      
                                        

  

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  <script src="global.min.js"></script>
<script src="quixnav-init.js"></script>
<script src="jquery.validate.min.js"></script>  <script src="jquery.validate-init.js"></script>
<script src="increment.js"></script>
<script src="submit.js"></script>
<script src="jquery.steps.min.js"></script>
<script src="jquery-steps-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="jquery.dataTables.min.js"></script>
<script src="datatables.init.js"></script>
<script src="custom.min.js"></script>


  
    <!-- momment js is must -->
    <script src="moment.min.js"></script>
   



@endsection
