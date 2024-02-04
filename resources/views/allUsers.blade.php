@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')

<div class="content-body">
           

 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last  Name</th>
                                                <th>Username</th>
                                                <th>User role</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>
                                                    Danny
                                                </td>
                                                <td>
                                                    Antoine
                                                </td>
                                                <td>
                                                    <span class="badge badge-primary">Admintest</span>
                                                </td>
                                                <td>
                                                    Admin
                                                </td>
                                                <td>
                                                    danny@gmail.com
                                                </td>

                                                <td>
                                                   2/8/2023
                                                </td>
                                            </tr>
                                             
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

</div>
 @endsection