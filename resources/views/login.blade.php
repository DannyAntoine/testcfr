@extends('layout')

@section('title','Login')

@section('content')



<div class="grid">

      <form action="{{route('login.post')}}" method="POST" class="form login">
         @csrf

@method('POST')
      <div class="form__field">
        <label for="username"><svg class="icon">
            <use xlink:href="#icon-user"></use>
          </svg><span class="hidden">Username</span></label>
        <input autocomplete="username" id="username" type="text" name="username" class="form__input" placeholder="Username" required>
      </div>

      <div class="form__field">
        <label for="password"><svg class="icon">
            <use xlink:href="#icon-lock"></use>
          </svg><span class="hidden">Password</span></label>
        <input id="password" type="password" name="password" class="form__input" placeholder="Password" required >
      </div>
   

      <div class="form__field">
        <input type="submit" value="LOGIN">
      </div>

    </form>

    

  </div>


  


  <div class="container">
@if($errors ->any())



    @foreach($errors ->all() as $error)
    
    <div class="xd-message msg-danger">
    <div class="xd-message-icon"><i class="ion-close-round"></i></div>
    <div class="xd-message-content">
    {{$error}}
    </div>

</div>

    @endforeach
   
 @endif
 </div>
 @if(session() -> has('error'))
 <div class="alert alert-danger">{{session('error')}}</div>
 @endif
</div>

</div> 

@endsection