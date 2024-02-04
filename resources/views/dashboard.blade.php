@extends('dashboard-layout')

@section('title','Dashboard')

@section('content')




  
         <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Central Furniture Rescue</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                      
                    </div>
                </div>
   
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-check text-success border-success"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Approved Cases</div>
                                    <div class="stat-digit">{{$fullfillecase_count}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-clock-history text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Pending Cases</div>
                                    <div class="stat-digit">{{$pendingcases_count}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-plus text-pink border-pink"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Total Case</div>
                                    <div class="stat-digit">{{$totalcases_count}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="bi bi-x text-danger border-danger"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Declined Cases</div>
                                    <div class="stat-digit">{{$declinedcases_count}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Completed Cases -2023</h4>
                            </div>
                            <div class="card-body">
                                <div class="ct-bar-chart mt-5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="ct-pie-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>


               
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Declined Cases -2023</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="morris_donught" class="morris_chart_height"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="card">
                                <div class="card-header">
                                        <h4 class="card-title">Total Cases </h4>
                                    </div>
                                    <div class="card-body p-0">
                                        <div id="morris_line" class="morris_chart_height"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                            
                            
                            
                            
                            <div class="row">
                            <div class="col-12"> 
                            <div class="row">
                                     
                            <div class="col-lg-6 col-sm-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Pending Cases</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="morris_bar" class="morris_chart_height"></div>
                                    </div>
                                </div>
                            </div>
                            
                        
                         

                            
                        <div class="col-lg-6 col-sm-12 col-md-6">
                        <!-- calender-->
                            
                          
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="app-fullcalendar"></div>
                            </div>
                        </div>
                    
                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                                        event</button>

                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-category">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add a category</strong></h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Event  Color</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="green">Green</option>
                                                    <option value="Red">Red</option>
                                                    <option value="info">Info</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                      
                </div>
                 
        
                                 
                             </div>
                             </div>
                             </div>
                             
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pivot Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Grade Point</th>
                                                <th>Percent Form</th>
                                                <th>Percent Upto</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Class Test</td>
                                                <td>Mathmatics</td>
                                                <td>
                                                    4.00
                                                </td>
                                                <td>
                                                    95.00
                                                </td>
                                                <td>
                                                    100
                                                </td>
                                                <td>20/04/2017</td>
                                            </tr>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  

                    
                   

 <!-- col-xl-4 col-xxl-6 col-lg-6 col-md-12 col-sm-12 -->

                    <div class="row">
                      <div class="card">
                       <div class="card-header">
                         <h4 class="card-title">Todo</h4>
                        </div>
                        <div class="card-body px-0">
                       <div class="todo-list">
                       <div class="tdl-holder">
                    <div class="tdl-content widget-todo2 mr-4">
                        <ul id="todo_list" 
                            data-save-todo="{{ route('save-todo') }}" 
                            data-update-todo-status="{{ route('update-todo-status', ':id') }}"  >

                            <livewire:todo-list-l-w />
                           
                         </ul>
                   </div>
            </div>
        </div>
    </div>
 </div>



       
         
                

                
                    
                  
              

           





            


        </div>
               
      
                    
                    
         </div>
         </div>
       

         @livewireScripts
    </div>
   
@endsection