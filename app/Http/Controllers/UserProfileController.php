<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pendingcases;
use App\Models\FamilyDemographicsModel;
use App\Models\RequestOrderModel;
use App\Models\Family;
use App\Models\notes;
use App\Models\upload;
use App\Models\referral;
use App\Models\client_profile_ext;
use App\Models\ClientDataModel;

class UserProfileController extends Controller
{

    public function showProfile(Request $request)
    {

    $family_id = $request->input('family_id');


    // retrieve the client basic info
    $client_info = Family::where('id', $family_id)->first();
    // retrieve the pending case with the given family_id
    $pendingcase = pendingcases::where('family_id', $family_id) -> first();
    // retrieve the family demographics data for the selected family
    $familydemographics = FamilyDemographicsModel::where('family_id',$family_id) -> get();
    //retrive the children in the family demographic table 
    $lessThan18 = $familydemographics -> where('age', '<' , 18) -> groupBy('age');
    // lets get or retrive the adults in the family demographic table 
    $greaterThan18 = $familydemographics -> where('age', '>', 17) ->groupBy('age');
    // get client gender or headouf household gender
    $headofhouseholdgender = $familydemographics -> where('gender', $client_info ['headofhousehold_firstname']);
    // retrieve the requested order for the selected family
    $requestorder = RequestOrderModel::where('family_id', $family_id) ->get();
    
    // showEvidenceController
    $evidenceDocs = upload:: where('family_id', $family_id) -> get();
    
    // referral type 

    $referraltype = referral:: all();

    $referralresult = client_profile_ext:: where('family_id', $family_id) ->get();

    // pdf access

    $pdfDoc =ClientDataModel::where('family_id', $family_id) ->get();

    $pullnotes = notes:: where('family_id',$family_id) ->get();
    return view('profile',  [
        'pendingcases' => $pendingcase,
        'family_id' => $family_id,
        'clients' => $client_info,
        'pdfDoc' => $pdfDoc,
        'referraltype' => $referraltype,
        'crt' => $referralresult,
        'files' => $evidenceDocs,
        'families' => $familydemographics,
        'requestorders' => $requestorder,
        'lessThan18' => $lessThan18,
        'headofhouseholdgender' => $headofhouseholdgender,
        'notes' => $pullnotes,
        'greaterThan18' => $greaterThan18
    ]); 
        }

   // this function is to update the profile information if needed 
        public function updateprofile(Request $req, $id) {
            
          //  $profilecanvas = $req -> input('profilecanvas');
            //$id = Family::find($id);
            


        }
}













































       
         /*
        // retrive the client basic info

        $client_info = Family::where('id', $family_id)->first();
    // retrive the pending case with the given family_id

    $pendingcase = pendingcases::where('family_id', $family_id) -> get();
     
    // retrive the family demographics data for the selected family

    $familydemographics = FamilyDemographicsModel::where('family_id',$family_id) -> first();

    // retrive the requested order for the selected family

    $requestorder = RequestOrderModel::where('family_id', $family_id) -> first();
      
   
    return view('profile', ['pendingcases' => $pendingcase,
                            'clients' => $client_info,  
                           'families' =>  $familydemographics ,
                           'requestorders' => $requestorder]);  */