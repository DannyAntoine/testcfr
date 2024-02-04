<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;
use App\Models\client_profile_ext;
use App\Models\referral;

class SaveReferralTypeController extends Controller
{
    public function saveReferralCheckBoxes(Request $request){
        $checkboxes = $request->input('options');

        $family_id = $request->input('family_id');

        $profile = client_profile_ext::where('family_id', $family_id)->first();

        if(!$profile) {
            $profile = new client_profile_ext();
            $profile->family_id = $family_id;
        }
       
        $referralDescriptions = []; 
        
        
        foreach ($checkboxes as $option) {
            $referral = referral::find($option);
            
            if ($referral) {
                $referralDescriptions[] = $referral->referal_description;
            }
        }
        $profile->CaseReferalType = implode(' , ', $referralDescriptions);


        if($profile->save()) {
            session()->flash('notification', ['type' => 'success', 'message' => 'Referral type Saved Sucessfully']);
        } else {
            session()->flash('notification', ['type' => 'error', 'message' => 'Error occurred while saving referral type']);
        }
    
        return redirect()->back();

        // Dont forget to add notification return for failure or success 
    }
}
