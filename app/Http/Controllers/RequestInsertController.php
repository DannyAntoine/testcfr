<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\baths;
use App\Models\FamilyDemographicsModel;
use App\Models\Family;
use App\Models\pendingcases;
use Carbon\Carbon;
use App\Events\NewPendingCase;
use App\Models\ClientDataModel;
use  PDF;





class RequestInsertController extends Controller
{
    // the following function is responsible for rendering the form view
    public function insform(){
        return view('requestform');
    }

    public function postdata(Request $req){
    
      

        
      // handeling first serction of multi step form 
         $firstname = $req->input('firstName'); // taking data from the firstname text field on the request form 
         $lastname  = $req->input('lastName'); // taking data form the lastname text field on the request form
         $phone_num = $req->input('phone_number'); // ||
         $received_date = $req -> input('receivedDate');
         $moveInDate = $req -> input('moveInDate');
         $address   = $req->input('address'); // ||
         $address2  = $req->input('address2');
         $city      = $req->input('city');
         $state     = $req->input('state');
         $zip       = $req->input('zip');
         $numAdults = $req->input('numberofAdults'); //||
         $numkids   = $req->input('numberofChildren');
         $agency    = $req->input('agency');
         $advocate_FirstName = $req -> input('advocatefirstName');
         $advocate_Lastname = $req -> input('advocatelastName');
         $dob  = $req -> input('dob');
         $gender = $req ->input('Gender');
         $maritalstatus = $req -> input('MaritalStatus'); 
         $email = $req ->input('email');
         
        $data = array('headofhousehold_firstname' => $firstname,
                      "headofhousehold_lastname" => $lastname,
                       "phone" => $phone_num,
                       "address" => $address,
                       "address2" => $address2,
                        "City" => $city,
                        "State" => $state,
                        "Zip" => $zip,
                        "numofadults" => $numAdults, 
                        "numofkids" => $numkids, 
                        "agency" => $agency, 
                        "Advocate_FirstName" =>  $advocate_FirstName, 
                        "Advocate_LastName" =>  $advocate_Lastname,
                         "DOB" => $dob,
                        "Gender" =>$gender,
                        "MaritalStatus" => $maritalstatus,
                        "receivedDate" =>  $received_date,
                        "MoveInDate" =>  $moveInDate,
                        "Email" => $email,
                        );
       
     // testing to send into pending case 
     
       
     // DB::table('family')->insert($data);

     //check to see if the data already exists in the database before inserting it.
     // check if a record with the same phone number already exists in the family table and only insert the data if it doesn't exist.
     $existingRecord = DB::table('family')
     ->where('phone', $phone_num)
     ->first();
 
 // insert data only if record doesn't exist
 if (!$existingRecord) {
     $data = array(
         'headofhousehold_firstname' => $firstname,
         'headofhousehold_lastname' => $lastname,
         'phone' => $phone_num,
         'address' => $address,
         'address2' => $address2,
         'City' => $city,
         'State' => $state,
         'Zip' => $zip,
         'numofadults' => $numAdults,
         'numofkids' => $numkids,
         'agency' => $agency,
         'Advocate_FirstName' =>  $advocate_FirstName, 
         'Advocate_LastName' =>  $advocate_Lastname,
         'DOB' => $dob,
         'Gender' =>$gender,
         'MaritalStatus' => $maritalstatus,
         'receivedDate' =>  $received_date,
         'MoveInDate' =>  $moveInDate,
         'Email' => $email,
     );
    }
  
       
     
   
       
   
 /*======================THE ABOVE CODE IS FOR THE FIRST PART OF THE MULTI FORM IT WORKS ===================*/ 

        // handling the second section of the multi step form for family_demographics
        // ===============================this is the adult section ========================================
          
        // the adult first name
        $adult_first_names = array();
           // Loop over $_POST array to find all keys starting with "adult"
           foreach ($_POST as $key => $value) {
             if (strpos($key, "adult") === 0 && strpos($key, "FirstName") !== false) {
               // extract the adult number from the key
               $key = str_replace("FirstName", "", $key);
               $parts = explode("adult", $key);
               $adult_number = intval($parts[1]);
           
               // extract the first name from the value
               $first_name = $value;
           
               // add the name to the array
              // $adult_first_names[] = "Adult " . $adult_number . " first name is " . $first_name;

              $adult_first_names[] =  $first_name;
             }
           }

           
           // output the array
          // dd($adult_first_names); 
        
            
        // the adult last name 
        $adult_last_names = array();
        // Loop over $_POST array to find all keys starting with adults in lastname input 

        foreach($_POST as $key =>$value) {
            if (strpos($key, "adult") === 0 && strpos($key, "LastName") !== false) {
                // extract the adult surname from the key
                $key = str_replace("LastName", "", $key);
                $lastnameparts = explode("adult",$key);
                $number = intval($lastnameparts[1]);
                // extract the last name from the value
                $last_name = $value;
                // add the last name to the array
               // $adult_last_names[] = "Adult".$number."last name is".$last_name;

                $adult_last_names[] = $last_name;
            }
        }
      
        //the adult age 
        $adult_age = array();
        // Loop over $_POST array to find all keys starting with adults in age input 

        foreach($_POST as $key => $value){
            if(strpos($key, "adult") === 0 && strpos($key, "Age") !== false) {
                // extract the age from the key
                $key = str_replace("Age", "", $key);
                $ageParts = explode("adult", $key);

                $agenumber = intval($ageParts[1]);
                //extract the age from the value
                $age = $value;

                // add age to the array
                //$adult_age[] = "Adult".$agenumber."age is :".$age;

                $adult_age[] = $age;
            }
        }

      

      // looping and  getting the gender for each adult
         $adult_gender = array();

         foreach ($_POST as $key => $value) {
             if (strpos($key, "adult") === 0 && strpos($key, "gender") !== false) {
                 // extract the adult number from the key
                 $key = str_replace("gender", "", $key);
                 $parts = explode("adult", $key);
                 $adult_number = intval($parts[1]);
         
                 // extract the gender from the value
                 $gender = $value;
         
                 // add the gender to the array
                 // this was used to test data: $adult_gender[] = "Adult " . $adult_number . " gender is " . $gender;

                 $adult_gender[] =  $gender;
             }
         }
         
         /// the above code for adults works fine 
          // ===============================this is the child section ========================================
        
          // getting the child first name
          $child_first_names = array();
           // Loop over $_POST array to find all keys starting with "Child"
            foreach ($_POST as $key => $value){
            if(strpos($key, "Child") === 0 && strpos($key, "FirstName") !== false){

                // extract the child firstname from the key
                $key =str_replace("FirstName", "", $key);
                $firstname_parts = explode("Child", $key);
                $child_firstname_number = intval($firstname_parts[1]);

                $childrenFirstName = $value;

                // this code is okay but wont be used: $child_first_names[] ="Child ". $child_firstname_number . " firstname is ". $childrenFirstName;
                $child_first_names[] =  $childrenFirstName;
            }

          }

          // getting the child last name

          $child_last_names = array();

          //Loop ofver $_POST array to find all keys starting with Child

          foreach($_POST as $key => $value){
             if(strpos($key, "Child") === 0 && strpos($key, "LastName") !== false){
                // extract the child last name from the key 

                $key = str_replace("LastName", "" , $key);
                $lastname_parts = explode("Child", $key);
                $child_lastname_number = intval($lastname_parts[1]);

                $childrenlastname = $value;

                // this code is okay but wont be used: $child_last_names[] = "Child". $child_lastname_number . "lastname is". $childrenlastname;
                $child_last_names[] =   $childrenlastname;
             }
          }
        
           //the Child age 
        $child_age = array();
        // Loop over $_POST array to find all keys starting with adults in age input 

        foreach($_POST as $key => $value){
            if(strpos($key, "Child") === 0 && strpos($key, "Age") !== false) {
                // extract the age from the key
                $key = str_replace("Age", "", $key);
                $child_ageParts = explode("Child", $key);

                $child_agenumber = intval($child_ageParts[1]);
                //extract the age from the value
                $Children_age = $value;

                // add age to the array
               // this code is okay but wont be used: $child_age[] = "Child".$child_agenumber."age is :".$Children_age;
                
                $child_age[] = $Children_age;
            }
        }

         // looping and  getting the gender for each Child
         $child_gender = array();

         foreach ($_POST as $key => $value) {
             if (strpos($key, "Child") === 0 && strpos($key, "Gender") !== false) {
                 // extract the adult number from the key
                 $key = str_replace("Gender", "", $key);
                 $c_parts = explode("Child", $key);
                 $child_number = intval($c_parts[1]);
         
                 // extract the gender from the value
                 $childgender = $value;
         
                 // add the gender to the array
                // this code is okay but wont be used: $child_gender[] = "Child " . $child_number . " gender is " . $childgender;

                 $child_gender[] = $childgender;
             }
         
         }

         
         // submit to family_demographics table 

          // create a new row in the `family` table and get its `id`

 
        
 $familyId = DB::table('family')->insertGetId($data);


 
  



 /* the  following code loops the the arrays for child info to submit to database */
 // Insert child data into the family_demographics table
 // for each child in the $child_first_names array
 foreach ( $child_first_names as $key => $value) {
    DB::table('family_demographics')->insert([
        'firstname' => $value,
        'lastname' => $child_last_names[$key],
        'age' => $child_age[$key],
        'gender' => $child_gender[$key],
        'family_id' => $familyId
    ]);
 }

 /* the  following code loops the the arrays for adult info to submit to database */
 // Insert adult data into the family_demographics table
 // for each adult in the $child_first_names array

 foreach ($adult_first_names as $key => $adult_value) {

    DB::table('family_demographics') -> insert([
        'firstname' => $adult_value,
        'lastname' => $adult_last_names[$key],
        'age' => $adult_age[$key],
        'gender' => $adult_gender[$key],
        'family_id' => $familyId

    ]);
 }




        // $fd_data = array('firstname' => $adult_first_names, 'firstname' => $child_first_names, 'lastname' => $adult_last_names, 'lastname' => $child_last_names, 'age' => $adult_age, 'age' => $child_age, 'gender' =>  $adult_gender , 'gender' => $child_gender);
        // DB::table('family_demographics') -> insert($fd_data);
 
    //dd([$adult_first_names, $adult_last_names, $adult_age, $adult_gender, $child_first_names,$child_last_names, $child_age,$child_gender]);

    /*======================THE ABOVE CODE IS FOR THE SECOND PART OF THE MULTI FORM IT WORKS ===================*/ 

        // handling the third section of the multi step form for request order
    
       
       $bathQuantities = $_POST['bathitems'];
       $itemNames =[];

       // retrive all items from the database

       $items = DB::table('bath') -> get();

       // the following code creates an array to store the item names

       foreach ($items as $item) {

        $itemNames[$item->id] = $item -> bath_item;
       }

       $outputs = []; // this array will hold the output for each item


      

 // Insert the selected items into the requestorder table
 $bathrequestOrder =[
  'family_id' => $familyId, 
  'category' => 'BATH', // set the requested item type
  'categoryTotal' => array_sum($bathQuantities), // set the total amount needed
  'daterequested' =>  now()  // set the current date and time
 ];


       foreach($bathQuantities as $id => $quantity) {
        
        if($quantity >0){

            // using optional object operator to avoid errors

            $item = DB::table('bath') ->where('id',$id)->first();
            
            if($item){

                $itemName = $item->bath_item;
                DB::table('requestorder')->insert([
                    'family_id' => $familyId,
                    'category' => 'BATH',
                    'categoryTotal' => array_sum($bathQuantities),
                  'requestedItem' => $itemName,
                  'amountNeeded' => $quantity,
                  'daterequested' =>  now() 
                ]);




             $output = $item ->bath_item. ':'.$quantity;
             $outputs[] = $output; // append the output to the array
            }
        }
  

       }

       $outputString = implode(', ', $outputs); // Join the outputs into a single string
//dd($outputString);
       
       
       // condition if any item from living room category was selected 
       
       $livingroomQuantities = $_POST['livingroomitems'];
       
    
       $livingroomItemsNames =[];
       
       //retrive all items from table for livingroom category
       $livingroomItems = DB::table('livingroom') -> get();
       
       // create an array to store the items
       
       foreach($livingroomItems as $livingroomItem) {
           $livingroomItemsNames[$livingroomItem -> id] = $livingroomItem -> livingroom_item;
       }
       
       $livingroomOutputs =[]; // this array will hold the output for each item
       
       $livingroomrequestOrder = [
          'family_id' => $familyId, 
  'category' => 'LIVINGROOM', // set the requested item type
  'categoryTotal' => array_sum($livingroomQuantities), // set the total amount needed
  'daterequested' =>  now()  // set the current date and time 
       ];
       
       
       foreach($livingroomQuantities as $id => $livingRoomQuantity) {
           if ($livingRoomQuantity > 0) {
               
               $livingroomItem = DB::table('livingroom') -> where('id',$id)->first();
               
               if( $livingroomItem) {
                   
                    $livingroomItemsName = $livingroomItem -> livingroom_item;
                    DB::table('requestorder') -> insert([
                  'family_id' => $familyId,
                  'category' => 'LIVINGROOM',
                  'categoryTotal' => array_sum($livingroomQuantities),
                  
                  'requestedItem' => $livingroomItemsName,
                  'amountNeeded' => $livingRoomQuantity,
                  'daterequested' =>  now() 
                    ]);
                    
                 
                    $livingroomOutput = $livingroomItem -> livingroom_item. ':' .$livingRoomQuantity;
                    $livingroomOutputs[] =$livingroomOutput; //append the output to the array 
               }
           }
       }
       
       $livingroomOutputString = implode( $livingroomOutputs);
       
       
       // condition if any item from bedding category was selected 
      
       $beddingQuantities = $_POST['beddingitems'];
      // dd($beddingQuantities);
       $beddingItemsNames =[];
       
       //retrive all items from table for livingroom category
       $beddingItems = DB::table('bedding') -> get();
       
       // create an array to store the items
       
       foreach($beddingItems as $beddingItem) {
           $beddingItemsNames[$beddingItem -> id] = $beddingItem -> bedding_item;
       }
       
       $beddingOutputs =[]; // this array will hold the output for each item
       
       $beddingrequestOrder = [
          'family_id' => $familyId, 
  'category' => 'BEDDING', // set the requested item type
  'categoryTotal' => array_sum($beddingQuantities), // set the total amount needed
  'daterequested' =>  now()  // set the current date and time 
       ];
       
       
       foreach($beddingQuantities as $id => $beddingQuantity) {
           if ($beddingQuantity > 0) {
               
               $beddingItem = DB::table('bedding') -> where('id',$id)->first();
               
               if( $beddingItem) {
                   
                    $beddingItemsName = $beddingItem -> bedding_item;
                    DB::table('requestorder') -> insert([
                  'family_id' => $familyId,
                  'category' => 'BEDDING',
                  'categoryTotal' => array_sum($beddingQuantities),
                  
                  'requestedItem' => $beddingItemsName,
                  'amountNeeded' => $beddingQuantity,
                  'daterequested' =>  now() 
                    ]);
                    
                 
                    $beddingOutput = $beddingItem -> bedding_item. ':' .$beddingQuantity;
                    $beddingOutputs[] =$beddingOutput; //append the output to the array 
               }
           }
       }
       
       $beddingOutputString = implode( $beddingOutputs); 
      
       // condition if any item from bedroom category was selected 
       
       $bedroomQuantities = $_POST['bedroomitems'];
     
       $bedroomItemsNames =[];
       
       //retrive all items from table for livingroom category
       $bedroomItems = DB::table('bedroom') -> get();
       
       // create an array to store the items
       
       foreach($bedroomItems as $bedroomItem) {
           $bedroomItemsNames[$bedroomItem -> id] = $bedroomItem -> bedroom_item;
       }
       
       $bedroomOutputs =[]; // this array will hold the output for each item
       
       $bedroomrequestOrder = [
          'family_id' => $familyId, 
  'category' => 'BEDROOM', // set the requested item type
  'categoryTotal' => array_sum($bedroomQuantities), // set the total amount needed
  'daterequested' =>  now()  // set the current date and time 
       ];
       
       
       foreach($bedroomQuantities as $id => $bedroomQuantity) {
           if ($bedroomQuantity > 0) {
               
               $bedroomItem = DB::table('bedroom') -> where('id',$id)->first();
               
               if( $bedroomItem) {
                   
                    $bedroomItemsName = $bedroomItem -> bedroom_item;
                    DB::table('requestorder') -> insert([
                  'family_id' => $familyId,
                  'category' => 'BEDROOM',
                  'categoryTotal' => array_sum($bedroomQuantities),
                  
                  'requestedItem' => $bedroomItemsName,
                  'amountNeeded' => $bedroomQuantity,
                  'daterequested' =>  now() 
                    ]);
                    
                 
                    $bedroomOutput = $bedroomItem -> bedroom_item. ':' .$bedroomQuantity;
                    $bedroomOutputs[] =$bedroomOutput; //append the output to the array 
               }
           }
       }
       
       $bedroomOutputString = implode( $bedroomOutputs);
       
      
   /////////////////////////////////////////////////////////////////
       
       $kitchenQuantities = $_POST['kichenitems'];
           //dd('kitchen stuff',$kitchenQuantities);
       $kitchenItemsNames =[];
       
       //retrive all items from table for livingroom category
       $kitchenItems = DB::table('kitchen') -> get();
       
       // create an array to store the items
       
       foreach($kitchenItems as $kitchenItem) {
           $kitchenItemsNames[$kitchenItem -> id] = $kitchenItem -> kitchen_item;
       }
       
       $kitchenOutputs =[]; // this array will hold the output for each item
       
       $kitchenrequestOrder = [
          'family_id' => $familyId, 
  'category' => 'KITCHEN', // set the requested item type
  'categoryTotal' => array_sum($kitchenQuantities), // set the total amount needed
  'daterequested' =>  now()  // set the current date and time 
       ];
       
       
       foreach($kitchenQuantities as $id => $kitchenQuantity) {
           if ($kitchenQuantity > 0) {
               
               $kitchenItem = DB::table('kitchen') -> where('id',$id)->first();
               
               if( $kitchenItem) {
                   
                    $kitchenItemsName = $kitchenItem -> kitchen_item;
                    DB::table('requestorder') -> insert([
                  'family_id' => $familyId,
                  'category' => 'KITCHEN',
                  'categoryTotal' => array_sum($kitchenQuantities),
                  
                  'requestedItem' => $kitchenItemsName,
                  'amountNeeded' => $kitchenQuantity,
                  'daterequested' =>  now() 
                    ]);
                    
                 
                    $kitchenOutput = $kitchenItem -> kitchen_item. ':' .$kitchenQuantity;
                    $kitchenOutputs[] =$kitchenOutput; //append the output to the array 
               }
           }
       }
       
       $kitchenOutputString = implode( $kitchenOutputs);
       ///////////////////////////////////////////////////////////////////////////
       
  // condition if any item from MISC category was selected 
       
       $miscellaneousQuantities = $_POST['miscsitems'];
       $miscellaneousItemsNames =[];
       
       
       $miscellaneousItems = DB::table('miscellaneous') -> get();
       
       // create an array to store the items
       
       foreach($miscellaneousItems as $miscellaneousItem) {
           $miscellaneousItemsNames[$miscellaneousItem -> id] = $miscellaneousItem -> misc_item;
       }
       
       $miscellaneousOutputs =[]; // this array will hold the output for each item
       
       $miscrequestOrder = [
          'family_id' => $familyId, 
  'category' => 'MISC', // set the requested item type
  'categoryTotal' => array_sum($miscellaneousQuantities), // set the total amount needed
  'daterequested' =>  now()  // set the current date and time 
       ];
       
       
       foreach($miscellaneousQuantities as $id => $miscellaneousQuantity) {
           if ($miscellaneousQuantity > 0) {
               
               $miscellaneousItem = DB::table('miscellaneous') -> where('id',$id)->first();
               
               if( $miscellaneousItem) {
                   
                    $miscellaneousItemsName = $miscellaneousItem -> misc_item;
                    DB::table('requestorder') -> insert([
                  'family_id' => $familyId,
                  'category' => 'MISC',
                  'categoryTotal' => array_sum($miscellaneousQuantities),
                  
                  'requestedItem' => $miscellaneousItemsName,
                  'amountNeeded' => $miscellaneousQuantity,
                  'daterequested' =>  now() 
                    ]);
                    
                 
                    $miscellaneousOutput = $miscellaneousItem -> misc_item. ':' .$miscellaneousQuantity;
                    $miscellaneousOutputs[] =$miscellaneousOutput; //append the output to the array 
               }
           }
       }
       
       $miscellaneousOutputString = implode( $miscellaneousOutputs);
       ////////////////////////////////////////////////////////////////////////// /
       
  // ***** condition if any item from BABY category was selected *****
       
       $babyQuantities = $_POST['babyitems'] ??[];
       
       $categoryTotal = array_sum($babyQuantities);
       
      // dd("baby quantities:" ,$babyQuantities, "Category Total:", $categoryTotal);
       $babyItems = DB::table('baby')
               ->whereIn('id',array_keys($babyQuantities)) // get the requested items
               ->get();
       $babyOutputs =[]; // this array will hold the output for each item
       
       
       
       foreach($babyQuantities as $id => $babyQuantity) {
           if ($babyQuantity > 0) {
               
               $babyItem = $babyItems -> where('id',$id)->first();
               
               if( $babyItem) {
                   
                    $babyItemsName = $babyItem -> baby_item;
                    DB::table('requestorder') -> insert([
                  'family_id' => $familyId,
                  'category' => 'BABY',
                        
                  'categoryTotal' => array_sum($babyQuantities),
                  
                  'requestedItem' => $babyItemsName,
                  'amountNeeded' => $babyQuantity,
                  'daterequested' =>  now() 
                    ]);
                    
                 
                    $babyOutput = $babyItem -> baby_item. ':' .$babyQuantity;
                    $babyOutputs[] =$babyOutput; //append the output to the array 
               }
           }
       }
       
        
       
       $babyOutputString = implode( $babyOutputs);
       //////////////////////////////////////////////////////////////////////////
       
        /*************************=====*************************************************/
       /*
      $smallappliancesQuantities = $_POST['SAitems'] ??[];
      
       
       
      print_r($_POST);
       
       // Convert to an array if it's not already
$smallappliancesQuantities = is_array($smallappliancesQuantities) ? $smallappliancesQuantities : [$smallappliancesQuantities];
       
       dd($smallappliancesQuantities); // Add this line to display the value of $smallappliancesQuantities


$SmallItemsCategoryTotal = array_sum($smallappliancesQuantities);
    
       
       
       $smallappliancesItems = DB::table('smallappliances') 
               ->whereIn('id',array_keys($smallappliancesQuantities))
               -> get();
       $smallappliancesOutputs =[]; // this array will hold the output for each item
         
       
       
       foreach($smallappliancesQuantities as $id => $smallappliancesQuantity) {
           if ($smallappliancesQuantity > 0) {
               
               $smallappliancesItem = $smallappliancesItems -> where('id',$id)->first();
               
               if( $smallappliancesItem) {
                   
                    $smallappliancesItemsName = $smallappliancesItem -> smallAppliances_item;
                    DB::table('requestorder') -> insert([
                  'family_id' => $familyId,
                  'category' => 'SMALL APPLIANCES',
                  'categoryTotal' => $SmallItemsCategoryTotal,
                  
                  'requestedItem' => $smallappliancesItemsName,
                  'amountNeeded' => $smallappliancesQuantity,
                  'daterequested' =>  now() 
                    ]);
                    
                 
                    $smallappliancesOutput = $smallappliancesItem -> smallAppliances_item. ':' .$smallappliancesQuantity;
                    $smallappliancesOutputs[] =$smallappliancesOutput; //append the output to the array 
               }
           }
       }
       
       $smallappliancesOutputString = implode( $smallappliancesOutputs); 
       /////////////////////////////////////////////////////////////////////////
      
 /*************************=====*************************************************/
 

 // create pdf file for case

 $categoryItems = [
    'Living Room' => $livingroomOutputs ?? [], // replace '$livingroomOutputs' with your actual variable
    'Bedding' => $beddingOutputs ?? [],
    'Bedroom' => $bedroomOutputs ?? [],
    'Kitchen' => $kitchenOutputs ?? [],
    'Miscellaneous' => $miscellaneousOutputs ?? [],
    'Baby' => $babyOutputs ?? [],
];
 
 $pdf = PDF::loadView('pdf_layout', [
   
    'headofhousehold_firstname' => $firstname,
    'headofhousehold_lastname' => $lastname,
    'phone' => $phone_num,
    'address' => $address,
    'address2' => $address2,
    'City' => $city,
    'State' => $state,
    'Zip' => $zip,
    'numofadults' => $numAdults,
    'numofkids' => $numkids,
    'agency' => $agency,
    'advocatefirstName' => $advocate_FirstName,
    'advocatelastName' => $advocate_Lastname,
    'Gender' => $gender,
    'MaritalStatus' => $maritalstatus,
    'receivedDate' => $received_date,
    'MoveInDate' => $moveInDate,
    'adult_first_names' => $adult_first_names,
    'adult_last_names' => $adult_last_names,
    'adult_age' => $adult_age,
    'adult_gender' => $adult_gender,
    'child_first_names' => $child_first_names,
    'child_last_names' => $child_last_names,
    'child_age' => $child_age,
    'child_gender' => $child_gender,
    'categoryItems' => $categoryItems,
    'livingroomOutputString' => $livingroomOutputString ? 'Living Room: ' . $livingroomOutputString : '',
    'beddingOutputString' => $beddingOutputString ? 'Bedding: ' . $beddingOutputString : '',
    'bedroomOutputString' => $bedroomOutputString ? 'Bedroom: ' . $bedroomOutputString : '',
    'kitchenOutputString' => $kitchenOutputString ? 'Kitchen: ' . $kitchenOutputString : '',
    'miscellaneousOutputString' => $miscellaneousOutputString ? 'Miscellaneous: ' . $miscellaneousOutputString : '',
    'babyOutputString' => $babyOutputString ? 'Baby: ' . $babyOutputString : '',


 ]); 

 $pdfdata = $pdf ->output();

 DB::table('client_data') -> insert([

    'family_id' => $familyId,
    'client_file'=> $pdfdata,
    'created_at' => now(),
    'updated_at' => now()

 ]); 
 

// taking main data to create basic profile to be displayed on pending case 

  DB::table('pendingcase') -> insert([
     'firstname' => $firstname,
     'lastname' => $lastname,
     'family_id' => $familyId,
     'receivedDate' => $received_date,
     'MoveInDate' =>  $moveInDate,
     'daterequested' =>  now() 
  ]);


 
    return redirect()->back()->with('success', 'Data inserted successfully.');
  
    }

    
}
