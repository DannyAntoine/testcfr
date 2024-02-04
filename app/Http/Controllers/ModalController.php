<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendingcases;
use App\Models\FamilyDemographicsModel;
use App\Models\RequestOrderModel;
use App\Models\Family;
use App\Models\notes;
use App\Models\referral;



class ModalController extends Controller
{
    //  edit notes modal . lets try to pass the variable here to the modal view 
    public function loadModal($note_id){
     
        return view('modal', ['note_id' => $note_id]);
    }

    public function test(){

        $referraltype = referral:: all();

        return view('modal', [ 'referraltype' => $referraltype]);
    }
}
