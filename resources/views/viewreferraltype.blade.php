@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')



<div class="content-body">
           

 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">REFERRAL TYPE </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Referral Type Name</th>
                                                <th>Description</th>
                                                
                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($lr as $referrals)
                                            <tr>
                                                <td>{{$referrals -> referralName}}</td>
                                                <td>{{$referrals -> referal_description}}</td>
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