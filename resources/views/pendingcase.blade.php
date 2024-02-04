@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')



<div class="content-body">
           

 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">PENDING CASE</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last  Name</th>
                                                <th>Family ID </th>
                                                <th>Received Date</th>
                                                <th>Move In Date</th>
                                                <th>Date Entered</th>
                                                <th>Status</th>
                                                <th> See More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        
                                        @foreach ($pendingcases as $pendingcase)
                                            <tr>
                                               
                                                
                                                <td>{{$pendingcase['firstname']}} </td>
                                                <td>{{$pendingcase['lastname']}} </td>
                                                <td>{{$pendingcase['family_id']}} </td>
                                                <td>{{\Carbon\Carbon::parse($pendingcase['receivedDate']) ->format('m/d/Y') }}</td>
                                                <td> @if ($pendingcase['MoveInDate']) {{\Carbon\Carbon::parse($pendingcase['MoveInDate']) ->format('m/d/Y') }} @else N/A @endif</td>
                                                <td>{{\Carbon\Carbon::parse($pendingcase['daterequested']) ->format('m/d/Y h:i A') }}</td>
                                                <td>
                                                <span class="badge badge-primary">Pending</span>
                                                </td>

                                                <td>
                                                <div><a href="{{ route('profile') }}?family_id={{ $pendingcase->family_id }}" class="btn btn-primary text-center mb-2">See More</a></div>
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
