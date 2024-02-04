@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')



<div class="content-body">
           

 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ADD AGENCY </h4>
                            </div>
                            <div class="card-body">
                            <form action = "{{ route ('submit-agency-data') }} " method="POST">
                            @csrf                           

                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Name</label>
                                                                    <input type="text" name="agencyname" class="form-control" required>
                                                                </div>
                                                                
                                                                <div class="form-group col-md-6">
                                                                    <label>Description</label>
                                                                    <input type="text" name="description" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input type="text" placeholder="1234 Main St" name="address1" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Address 2</label>
                                                                <input type="text" placeholder="Apartment, studio, or floor" name="address2" class="form-control">
                                                            </div>

                                                            <div class="form-row">

                                                                 <div class="form-group col-md-4">
                                                                <label>Phone</label>
                                                                <input type="text" placeholder="123456789" class="form-control" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter a valid phone number in the format XXX-XXX-XXXX" required>
                                                                </div>
                                                               <div class="form-group col-md-4">
                                                                <label>Email</label>
                                                                <input type="email" placeholder="something@example.com" name="email" class="form-control" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Please enter a valid email address" required>
                                                               </div>

                                                               <div class = "form-group col-md-4">
                                                                <label> Website</label>
                                                                <input type="text" placeholder="agencywebsite.org" name ="website" class="form-control" title ="please enter a website" required>
                                                               </div>

                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>City</label>
                                                                    <input type="text" class="form-control" name="city" required>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>State</label>
                                                                    <select class="form-control" name="statedropdown" id="inputState" required>
                                                                       
                                                                        <option>Iowa</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Zip</label>
                                                                    <input type="text" class="form-control" name="zip" pattern="[0-9]{5}" title="Please enter a valid 5-digit zip code"  required>
                                                                </div>
                                                            </div>
                                                           
                                                            <button class="btn btn-primary" type="submit">Add Agency</button>
                                                        </form>
                            </div>
                        </div>
                    </div>

</div>

@endsection

