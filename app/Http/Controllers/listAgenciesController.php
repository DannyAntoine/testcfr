<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use DB;
use App\Models\listagency;

class listAgenciesController extends Controller
{
    //

    public function listAgencies(){

        // pulliing from the database via the model for agency 
        $agencydata = listagency::all();
       
      
        // returning item  to the viewagency view 
        return view('viewagency', [ 'va' => $agencydata]);

   }
}









 