<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\declinecases;
use App\Models\fullfillmentcases;
use App\Models\pendingcases;
use App\Models\FamilyDemographicsModel;
use App\Models\RequestOrderModel;
use App\Models\Family;
use App\Models\received;
use App\Models\upload;
use App\Models\referral;
use App\Models\client_profile_ext;
use App\Models\todolist;
use Livewire\Livewire;
use App\Http\Livewire\TodoListLW;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard (Request $request)
    {

    $family_id = $request->input('family_id');


    // retrieve the client basic info
    $client_info = Family::where('id', $family_id)->first();

    $fullfilled = fullfillmentcases::where('family_id', $family_id) -> first();
   
    $declinedcases= declinecases::where('family_id', $family_id) -> first();

    
    // retrieve the family demographics data for the selected family
    $familydemographics = FamilyDemographicsModel::where('family_id',$family_id) -> get();
    

    //retrive the children in the family demographic table 
    $lessThan18 = $familydemographics -> where('age', '<' , 18) -> groupBy('age');
    // lets get or retrive the adults in the family demographic table 
    $greaterThan18 = $familydemographics -> where('age', '>', 17) ->groupBy('age');
    // get client gender or headouf household gender
    
    // retrieve the requested order for the selected family
    $requestorder = RequestOrderModel::where('family_id', $family_id) ->get();
    
    // showEvidenceController
    $evidenceDocs = upload:: where('family_id', $family_id) -> get();
    
    $received = received:: where('family_id', $family_id) -> get();
    // referral type 

    $referraltype = referral:: all();

    $referralresult = client_profile_ext:: where('family_id', $family_id) ->get();

  
    $fullfillecase_count = fullfillmentcases::count('id'); // count the number of cases in the fullfillment table 
    $declinedcases_count = declinecases::count('id'); // count the number of cases in the declined table 
    $pendingcases_count  = pendingcases::count('id'); // count the number of cases in the pending table 
    $totalcases_count    =  $fullfillecase_count +  $declinedcases_count +  $pendingcases_count ; // sum the fullfilment, declined and pending cases to get total cases


  /*======================================================================================================================================================================= */
    
      // Get the currently authenticated user
      $user = Auth::user();
    
      // Initialize an empty array for tasks
      $tasks = [];
  
      // Check if the user is authenticated
      if ($user) {
          // Retrieve tasks for the authenticated user
          $tasks = todolist::where('posted_by', $user->id)->get();
      } else {
          // Handle the case where the user is not authenticated
          session()->flash('notification', ['type' => 'error', 'message' => 'User not authenticated']);
          return redirect()->route('login'); // Redirect to the login page or handle as needed
      }
  

      
/*======================================================================================================================================================================= */
        
       
    // lets fetch the updated todo list
  
    
    return view('dashboard', [

        'tasks' => $tasks,
     
        'declined' => $declinedcases,
        'fullfilled' => $fullfilled,
        'fullfillecase_count' =>  $fullfillecase_count,
        'declinedcases_count' =>  $declinedcases_count,
        'pendingcases_count'  =>  $pendingcases_count,
        'totalcases_count'    =>  $totalcases_count,

        'reev' => $received,
        'family_id' => $family_id,
        'clients' => $client_info,
        'referraltype' => $referraltype,
        'crt' => $referralresult,
        'files' => $evidenceDocs,
        'families' => $familydemographics,
        'requestorders' => $requestorder,
        'lessThan18' => $lessThan18,
       
        
        'greaterThan18' => $greaterThan18
    ]); 
        }



      /*
    
  // this function will be used to create the task and store it in the db 
  public function create_task(Request $request) {
    // Get the currently authenticated user
    $user = Auth::user();

    // Check if the user is authenticated
    if ($user) {
        $task = $request->input('todo');

        // Create a new instance of todolist model
        $TODO = new todolist();

        $TODO->task_name = $task;
        $TODO->task_status = 0; // Default status is to be unchecked 
        $TODO->posted_by = $user->id; // Assign the user ID to the user_id column in the todolist table

        // Save the task to the database
        $TODO->save();

        if ($TODO) {

           
            
           session()->flash('notification', ['type' => 'success', 'message' => 'Task was successfully added']);
           return response()->json(['success' => true]);
         
        } else {
            session()->flash('notification', ['type' => 'error', 'message' => 'Error occurred while adding Task']); 
        } 
    } else {
        // Handle the case where the user is not authenticated
        session()->flash('notification', ['type' => 'error', 'message' => 'User not authenticated']);
    }

  
}




    // the following function will be used to update the task status whether it will be check or unchecked

    public function update_status(Request $request, $id){
        // Get the currently authenticated user
        $user = Auth::user();
    
        // Check if the user is authenticated
        if ($user) {
            $status = $request->input('status');
    
            // Find the task in the database
            $task = todolist::where('id', $id)->first();
    
            if ($task) {
                // Update the task status
                $task->task_status = $status;
                $task->save();
    
                if ($task) {
                    return response()->json(['success' => true, 'message' => 'Task status updated successfully']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Failed to update task status']);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'Task not found']);
            }
        } else {
            // Handle the case where the user is not authenticated
            return response()->json(['success' => false, 'message' => 'User not authenticated']);
        }
    }
    
    */


    


        
}
