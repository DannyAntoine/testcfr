@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')



<div class="content-body">
           

 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">DECLINED CASE</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last  Name</th>
                                                <th>Family ID </th>
                                                <th>Date Requested </th>
                                                <th>Date Denied </th>
                                                <th> Reason for Decline</th>
                                                <th>Status</th>
                                                <th> See More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        
                                        @foreach ($declinedcases as $disqualified)
                                            <tr>
                                               
                                                
                                                <td>{{$disqualified -> firstname}} </td>
                                                <td>{{$disqualified -> lastname}} </td>
                                                <td>{{$disqualified -> family_id}} </td>
                                                <td>{{ \Carbon\Carbon::parse ($disqualified -> daterequested) ->format('m/d/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse ($disqualified -> datedeclined) ->format('m/d/Y')}}</td>
                                                <td>{{$disqualified -> reason}}</td>
                                                <td>
                                                <span class="badge badge-danger">Decline</span>
                                                </td>

                                                <td>
                                                <div><a href="{{ route('declinedcasesprofile', ['family_id' => $disqualified->family_id])}}" class="btn btn-primary text-center mb-2">See More</a></div>
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