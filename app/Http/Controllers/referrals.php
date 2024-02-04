<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use APP\Models\referral;
use Illuminate\Support\Facades\Notification;


class referrals extends Controller
{
    // the function as the add referral type to the db 

    public function postreferralType(Request $req) {

        $referralname = $req -> input('referralname');
        $description = $req->input('referral_description');


        $result = array ("referralName" => $referralname,
                         "referal_description" => $description
                        );

       $recordInserted = DB::table('referrals') -> insert ($result);

       if ($recordInserted) {

        $response = [
            'success' => true,
            'message' => 'Referral Type Saved Sucessfully'
        ];
    } else {
       $response = [
        'success'=> false,
        'message' => 'Error occurred while saving Referral Type'
       ];      
    }

   return response() -> json($response);
}



    
}
