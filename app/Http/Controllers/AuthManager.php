<?php

namespace App\Http\Controllers;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthManager extends Controller
{
 

 
    // the following code creates the login function

    function login() {
        return view(view:'login');
    }

    // the following code creates the sign up function

    function register () {

        return view(view:'register');
    }

    // the following code create the POST request function for login
    
    function loginPOST(Request $request){
        $request->validate([
             'username' => 'required',
             'password' => 'required'
        ]);

       $credentials = $request -> only(keys:['username', 'password']);
        if(Auth::attempt($credentials)){
            // lets test for login success
           return redirect() -> intended(route(name:'dashboard'));
        }

           return redirect(route('login')) -> with("error", "Incorrect Username or Password");
    }

    // the following code creates the POST request function for the sign up 

    function registerPOST(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required |email| unique:users',
            'password' => 'required',
            'user_type' => 'required|in:admin,standard'

       ]);
       
     
        $data['first_name'] = $request ->first_name;
        $data['last_name'] =  $request ->last_name;
        $data['username'] =   $request -> username;
        $data['email'] =      $request -> email;
        $data['password'] =  Hash:: make ($request -> password);
        $data ['user_type'] = $request -> user_type;
       

        $user = User:: create($data);

        if(!$user){
            return redirect(route('register')) -> with ("error", "action was not successful");
        }

        return redirect(route('login')) -> with("Sucess", "Registration was a success");

     
    }

// following code creates the logout function
    function logout(){
        Session::flush();
        Auth::logout();

        if(Auth::check()){
            dd("Logout failed");
        }
       
       
     
       return redirect('login');
       dd("Logout Succeeded");
    }
}
