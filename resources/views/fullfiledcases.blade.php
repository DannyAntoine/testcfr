@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')



<div class="content-body">
           

 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FULLFILED CASE</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last  Name</th>
                                                <th>Family ID </th>
                                                <th>Received Date </th>
                                                <th>Move In Date</th>
                                                <th>Date Entered </th>
                                                <th>Date of Approval</th>
                                                <th>Status</th>
                                                <th> See More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        
                                     
                                        @foreach ($fulfillcases as $fulfillcase)
                                            <tr>
                                               
                                                
                                            <td>{{ $fulfillcase->firstname }}</td>
                                            <td>{{ $fulfillcase->lastname }}</td>
                                            <td>{{ $fulfillcase->family_id }}</td>
                                            <td>{{ \Carbon\Carbon::parse ($fulfillcase->receivedDate ) ->format('m/d/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse ($fulfillcase->MoveInDate ) ->format('m/d/Y') }}</td>
                                             <td>{{ \Carbon\Carbon::parse ($fulfillcase->daterequested ) ->format('m/d/Y') }}</td>
                                             <td>{{ \Carbon\Carbon::parse( $fulfillcase -> approval_date ) ->format('m/d/Y ') }} </td>    
                                                
                                             <td>
                                                <span class="badge badge-success">FullFiled</span>
                                                </td>

                                                <td>
                                                <div><a href="{{ route('fulfilled-cases-profile', ['family_id' => $fulfillcase->family_id]) }}" class="btn btn-primary text-center mb-2">See More</a></div>
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

@endsection