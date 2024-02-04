<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\declinecases;
use App\Models\pendingcases;
use App\Models\fullfillmentcases;
use App\Models\received;
use App\Models\RequestOrderModel;
use Illuminate\Support\Facades\Session;

class CaseController extends Controller
{
    public function fulfillment(Request $request) {
 
      $receivedQuantities = $request->input('receivedQuantities');
      
      
      foreach ($receivedQuantities as $receivedQuantity) {
        $family_id = $receivedQuantity['familyId'];

        $requestOrderId = $receivedQuantity['requestOrderId'];

        $requestedItem = $receivedQuantity['requestedItem'];

        $receivedQty = (int) ($receivedQuantity['receivedQuantity']);
    
      $received = new received();
        $received->family_id = $family_id;
        $received->requestorder_id = $requestOrderId;
        $received->reev = $receivedQty;
        $received->requestedItem = $requestedItem;
        $received->save();
    }



  // if the case will be approved then the the first step is to delete the case from pending case and transfer it to fullfill case table
  
   

    $caseID = $request ->input('caseID');

   
    

    // Retrieve the case from the pending cases table 
    $pendingCase = pendingcases::find($caseID);
   
    if($pendingCase) {
      $fulfillmentCase = new fullfillmentcases();

      // transfer data from pending cases to fulfillment table

      $fulfillmentCase -> family_id = $pendingCase ->family_id;
      $fulfillmentCase -> firstname = $pendingCase ->firstname;
      $fulfillmentCase -> lastname  = $pendingCase ->lastname;
      $fulfillmentCase -> receivedDate = $pendingCase -> receivedDate;
      $fulfillmentCase -> MoveInDate = $pendingCase -> MoveInDate;
      $fulfillmentCase -> daterequested = $pendingCase ->daterequested;

      $fulfillmentCase->approval_date = now(); // the date the case was approved 

       // Delete the case from the pending cases table
       $pendingCase->delete();

    
      $fulfillmentCase->save();
     
      return response() -> json([
        'success' => true,
        'message' => 'Case Approved'
    ]);

  } else {
    return response() -> json([
      'success' => false,
      'message' => 'An error occurred'
  ]);
  }

  }





    public function decline(Request $req) {

     $reason = $req->input('reason'); // reason why case is being declined 
     $receivedQuantities = $req->input('receivedQuantities');


     foreach ($receivedQuantities as $receivedQuantity) {
      $family_id = $receivedQuantity['familyId'];
     
      $requestOrderId = $receivedQuantity['requestOrderId'];
     
      $requestedItem = $receivedQuantity['requestedItem'];
      // ask Mrs susan if she wants to have an automatic 0 since is decline or ask her if she wants to put it manually
      $receivedQty = (int) ($receivedQuantity['receivedQuantity']);
     
      $received = new received();
      $received->family_id = $family_id;
      $received->requestorder_id = $requestOrderId;
      $received->reev = 0; // $receivedQty we put a 0 because we want it to automatically add 0 to any because it is a disqualified case 
      $received->requestedItem = $requestedItem;
      $received->save();
     }

    

    $caseID = $req->input('caseID');



    // Retrieve the case from the pending cases table 
     $pendingCase = pendingcases::find($caseID);

     if($pendingCase) {

      $decline = new declinecases();

      // transfer data from pending case to decline case

      $decline -> family_id = $pendingCase ->family_id;
      $decline -> firstname = $pendingCase ->firstname;
      $decline -> lastname  = $pendingCase ->lastname;
      $decline -> daterequested = $pendingCase ->daterequested;

      $decline -> datedeclined = now(); // the date the case was declined 
      $decline -> reason =  $reason;  // reason for decline 

      // delete case from the pending case table

      $pendingCase ->delete();

      //save the declined case in the declined case table

      $decline ->save();

      return response() -> json([

        'success' => true,
        'message' => 'Case Sucessfully Declined'
      ]);
     } else {
        return response() -> json([
          'sucess' => false,
          'message' => 'An error occured'
        ]);
     }
  }
  
    
    
}
