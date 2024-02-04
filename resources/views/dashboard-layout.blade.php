<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">

        <link rel="stylesheet" type="text/css" href="{{asset ('dashboard-style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{asset ('chartist.css') }}" />
         
        <link rel="stylesheet" href="default.css">
        @livewireStyles
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
        <script src="progress.js" ></script> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
        
        <link rel="stylesheet" href="default.date.css">
        <link href="pignose.calendar.min.css" rel="stylesheet">
        <link href="progress.css" rel="stylesheet">
        <link href="fullcalendar.min.css" rel="stylesheet" type="text/css">
        <link href="metisMenu.min.css" rel="stylesheet">
        <link href="jquery.dataTables.min.css" rel="stylesheet" />
        <link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
        <link href="inv_style.css" rel="stylesheet"/>
        <link href="font-awesome.min.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{asset  ('jquery.steps.css')}}" />
        <link href="jquery.steps.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('_reboot.scss') }}" />
        <link rel="stylesheet" type="text/css" href="{{asset('_card.scss') }}" />
        <link rel="stylesheet" type="text/css" href="{{asset('_reset.scss') }}" />
        <link rel="stylesheet" type="text/css" href="{{asset('_form-steps.scss') }}" />
         @livewireAssets
    
        
    </head>
 <body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>



    
     <div id="main-wrapper">
     <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
          </div>
         <!--**********************************
            Nav header end
         ***********************************-->

         <!--**********************************
            Header start
         ***********************************-->
         <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        @auth
                        @php
                        $user = Auth::user();
                        // Access user properties
                       $name = $user->username;
                       $user_type = $user ->user_type;
                       $firstname = $user -> first_name;
                       $lastname  = $user -> last_name;
                        @endphp
                      <li class ="nav-item dropdown header-profile boldsize">
                        <a class = "nav-link" href="#" role= "button" data-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        <span class="ml-2"> {{$name}}</span>
                        </a>
                     <div class="dropdown-menu dropdown-menu-right">

                     <a class="dropdown-item">
                                        <i class="bi bi-person-circle"></i>
                                        <span class="ml-2">{{$firstname}} {{$lastname}}</span>
                        </a>


                        <a class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">User Type: {{$user_type}} </span>
                        </a>
                                 
                                    <a href="{{route('logout')}}" >
                                        <i class="icon-key"></i>
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                     </div>
                      </li>
                      @endauth
                     
                    </div>
                </nav>
            </div>
         </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i> <span class="nav-text">Dashboard</span></a>
                        <ul aria-expanded="false">
                           
                            <li><a href="{{url('/dashboard')}}">Dashboard </a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Inventory</li>
                      <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Inventory</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/updateInventory')}}">Update Inventory</a></li>
                          
                            <li><a href="{{url('/viewInventory')}}">View Inventory</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Case</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/requestform')}}">Request Form </a></li>
                            <li><a href="{{url('/pendingcase')}}">Pending Case</a></li>
                            <li><a href="{{url('/fullfiledcases')}}">Fullfield Case</a></li>
                            <li><a href="{{url('/decline')}}">Declined Case</a></li>
                           
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Client</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/family-demographics')}}">Family Background</a></li>
                         
                           
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Agency</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/viewagency')}}">View Agency</a></li>
                          
                            <li><a href="{{url('/addagency')}}"> Add Agency</a></li>
                         
                           
                        </ul>
                    </li>
                     
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Case Referral type</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/viewreferraltype')}}">View Referal Type</a></li>
                          
                            <li><a href="{{url('/addreferraltype')}}"> Add Referal Type</a></li>
                         
                           
                        </ul>
                    </li>


                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Reports</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/viewreferraltype')}}">Create A Report</a></li>
                          
                            
                         
                           
                        </ul>
                    </li>

                    <li class="nav-label">Users</li>
                      <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Users</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/allUsers')}}">All</a></li>
                            <li><a href="./ui-alert.html">Admin</a></li>
                            <li><a href="./ui-badge.html">Standard</a></li>
                            

                        </ul>
                     </li>

                     </ul>
                    </li>

                    <ul aria-expanded="false">
                    <img src ="{{asset('Central_furniture_rescue_logo.png')}}" alt= "Logo" aria-expanded="false" class = "logo_cfr" >
</ul>
                </ul>




            </div>
        </div>
 <!--  nav comes here -->

 @yield('content')


<!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © CFR</p>
                
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->


     <script src="global.min.js"></script>
    <script src="quixnav-init.js"></script>
    <script src="custom.min.js"></script>
    <script src="moment.min.js"></script> 

    <script src="chartist.min.js"></script>

    
    <script src="pignose.calendar.min.js"></script>

    @livewireScripts
    <script src="dashboard-2.js"></script> 

    <script src="picker.js"></script>
    <script src="todolist.js"></script>
    <script src="picker.time.js"></script>
    <script src="picker.date.js"></script>
    <script src="fullcalender-init.js"></script>
    <script src="fullcalender.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="styleSwitcher.js"></script>
    <script src="raphael.min.js"></script>
    <script src="morris.min.js"></script>
    <script src="morris-init.js"></script>



      <!-- Required vendors -->
      <script src="global.min.js"></script>
    <script src="quixnav-init.js"></script>
    <script src="custom.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="styleSwitcher.js"></script>

    <script src="moment.min.js"></script>

    <script src="jquery-ui.min.js"></script>
    <script src="fullcalendar.min.js"></script>
    <script src="fullcalendar-init.js"></script>


    <script id="save-todo-route" data-route="{{ route('save-todo') }}"></script>
<script id="update-todo-status-route" data-route="{{ route('update-todo-status', ':id') }}"></script>


</div>


@livewireScripts
</body>

</html>