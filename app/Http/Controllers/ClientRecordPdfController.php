<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Kitchens; 
use App\Models\livingrooms; 
use App\Models\bedrooms;
use App\Models\miscellaneous;
use App\Models\babies;
use App\Models\smallAppliances;
use App\Models\beddings;
use App\Models\baths;
use App\Models\agencyModel;
use App\Models\Family;
use App\Models\FamilyDemographicsModel;
use App\Models\declinecases;
use App\Models\pendingcases;
use App\Models\fullfillmentcases;
use App\Models\received;
use App\Models\RequestOrderModel;
use App\Models\ClientDataModel;
use Barryvdh\DomPDF\PDF;

use App\Models\referral;


class ClientRecordPdfController extends Controller
{
    public function viewPdf($documentId)
    {
        $document = ClientDataModel::find($documentId);

       

        if (!$document) {
            abort(404); // Or any appropriate HTTP response code for not found
        }

       
        $pdfData = $document->client_file;

        // Provide the appropriate headers for a PDF file
        return response($pdfData)
            ->header('Content-Type', 'application/pdf');
    }


    //  generate data for pdf document 

    public function loadData($family_id) {

     


        // retrieve the client basic info
        $basic_info = Family::where('id', $family_id)->first();

        if (!$basic_info) {
            abort(404); // Or handle the case appropriately
        }
        // retrieve the pending case with the given family_id
       // $pendingcase = pendingcases::where('family_id', $family_id) -> first();
        // retrieve the family demographics data for the selected family
      //  $familydemographics = FamilyDemographicsModel::where('family_id',$family_id) -> get();
        //retrive the children in the family demographic table 
      ///  $lessThan18 = $familydemographics -> where('age', '<' , 18) -> groupBy('age');
        // lets get or retrive the adults in the family demographic table 
      //  $greaterThan18 = $familydemographics -> where('age', '>', 17) ->groupBy('age');
        // get client gender or headouf household gender
      //  $headofhouseholdgender = $familydemographics -> where('gender', $client_info ['headofhousehold_firstname']);
        // retrieve the requested order for the selected family
      //  $requestorder = RequestOrderModel::where('family_id', $family_id) ->get();
        
      //  $referraltype = referral:: all();
    //
       // $referralresult = client_profile_ext:: where('family_id', $family_id) ->get();
    
        
    
      
      
        return view('pdf_layout', [
           
            'userbasic' => $basic_info,
          
        ]); 
            
    }





}
