@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')



<div class="content-body">
           

 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">OUR PATHNERS</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Agency Name</th>
                                                <th>Description</th>
                                                <th>Address </th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Website</th>
                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        
                                        @foreach ($va as $la)
                                            <tr>
                                               
                                                
                                                <td>{{ $la -> agencyname }}</td>
                                                <td>{{ $la -> descriptions}} </td>
                                                <td>{{ $la -> address_1}}  {{$la -> address_2}}  {{$la -> city}}  {{$la -> state}}  {{$la ->  zipcode}}</td>
                                                <td>{{ $la -> phonenumber}}</td>
                                                <td>{{ $la -> email}}</td>
                                                <td> {{$la -> website}}</td>
                                                

                                            </tr>
                                           
                                         @endforeach
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

</div>

@endsection