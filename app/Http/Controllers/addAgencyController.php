<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use APP\Models\agencyModel;

class addAgencyController extends Controller
{
   

    public function postagencydata(Request $request){

   

       
        $agencyname = $request->input('agencyname'); 
        $description = $request->input('description'); 
        $address1 = $request -> input('address1');
        $address2 = $request->input('address2'); 
        $phone   = $request->input('phone'); 
        $email = $request->input('email'); 
        $website = $request -> input('website');
        $city   = $request->input('city');
        $state = $request -> input('statedropdown');
        $zip = $request -> input('zip');


        $query = array("agencyname" => $agencyname,
                       "address_1" => $address1,
                       "address_2" => $address2,
                       "city" => $city,
                       "state" =>$state,
                       "zipcode" => $zip,
                       "phonenumber" =>$phone,
                       "email" => $email,
                       "website" => $website,
                       "descriptions" => $description); 

                       DB::table('agency')->insert($query);

                       return redirect()->back()->with('success', 'Agency Added Successfully.');
    }
}
