@extends('reg-layout')

@section('title','Register')

@section('content')


<form method="POST" action="{{route('register.post')}}">
        @csrf
        <div class="col">
            <div class="minput">
                <input type="text" id="fname" name="first_name" dir="auto" required>
                <span class="bar"></span>
                <label>First Name</label>
            </div>
            <div class="minput">
                <input type="text" id="lname" name="last_name" dir="auto" required>
                <span class="bar"></span>
                <label>Last Name</label>
            </div>
          
            <div class="control-group">
                <span class="user-type">User:</span>
                <label class="control control--radio">Admin
                    <input type="radio" name="user_type" value ="admin"  required />
                    <div class="control__indicator"></div>
                </label>
                <label class="control control--radio">Standard
                    <input type="radio" name="user_type" value ="standard"  required />
                    <div class="control__indicator"></div>
                </label>
            </div>
           
        </div>
        <div class="col">
            <div class="minput">
                <input type="text" id="pseudo" name="username" dir="auto" required>

                <span class="bar"></span>
                <label>Username</label>
            </div>

            <div class="minput">
                <input type="email" id="email" name="email" dir="ltr" class="" required>
                <span class="bar"></span>
                <label>Email</label>
            </div>

            <div class="minput">
                <input type="password" id="password" name="password" dir="auto" required>
                <span class="bar"></span>
                <label>Password</label>
            </div>

            <div class="minput">
                <input type="password" id="passwordConf" required>
                <span class="bar"></span>
                <label>Retype Password</label>
            </div>
            

            <div class="minput">
             
            <span id="valid" style="margin-bottom: 5px;">Valid fields : 1/7</span>
                
                <input type="submit" id="send" value="Submit"  style="padding:5px;padding-top:7px;">
            </div>
        </div>
    </form>



    <div class="mt-5">
@if($errors ->any())
  <div class="col-12">
    @foreach($errors ->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
  </div>
 @endif

 @if(session() -> has('error'))
 <div class="alert alert-danger">{{session('error')}}</div>
 @endif
</div>


    @endsection