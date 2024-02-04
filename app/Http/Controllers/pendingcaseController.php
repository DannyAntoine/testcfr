<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\pendingcases;

class pendingcaseController extends Controller
{
    public function showpendingcases(){
       
        // pulliing from the database via the model for pendingcase 
        $pendingdata = pendingcases::all();
        
       
        // returning item  to the pendingcase view 
        return view('pendingcase',['pendingcases' => $pendingdata]);
    }
}
