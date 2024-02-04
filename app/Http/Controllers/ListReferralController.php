<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\referral;

class ListReferralController extends Controller
{
    public function listreferraltypes() {
        // pulling from the database via the model for referral
     $referralsdata = referral::all();

  
     return view ('viewreferraltype', ['lr' => $referralsdata]);

  
 }
}







