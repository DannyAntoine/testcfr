
@extends('dashboard-layout')


@section('title','Dashboard')

@section('content')




<div class="content-body">

   <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>family demographics</h4>
                           
                        </div>
                    </div>
                   
                </div>



 

                <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FAMILY DEMOGRAPHICS</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Number of Adults</th>
                                                <th>Number of Kids</th>
                                                <th>Family ID</th>
                                                <th>First Name</th>
                                                <th>Last  Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                               
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
