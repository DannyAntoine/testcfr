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
use App\Models\Inventory;
use App\Models\Category;
use App\Models\RequestOrderModel;
use  PDF;
use Illuminate\Support\Facades\Session;






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
      // Initialize arrays to store extracted data
$adult_first_names = [];
$adult_last_names = [];
$adult_age = [];
$adult_gender = [];

// Extract first names
foreach ($_POST as $key => $value) {
    if (strpos($key, "adult") === 0 && strpos($key, "FirstName") !== false) {
        $adult_number = intval(str_replace("adult", "", str_replace("FirstName", "", $key)));
        $adult_first_names[$adult_number] = $value;
    }
}

// Extract last names
foreach ($_POST as $key => $value) {
    if (strpos($key, "adult") === 0 && strpos($key, "LastName") !== false) {
        $adult_number = intval(str_replace("adult", "", str_replace("LastName", "", $key)));
        $adult_last_names[$adult_number] = $value;
    }
}



// Extract ages
foreach ($_POST as $key => $value) {
    if (strpos($key, "adult") === 0 && strpos($key, "Age") !== false) {
        $adult_number = intval(str_replace("adult", "", str_replace("Age", "", $key)));
        $adult_age[$adult_number] = $value;
    }
}



// Extract genders
foreach ($_POST as $key => $value) {
    if (strpos($key, "adult") === 0 && strpos($key, "Gender") !== false) {
        $adult_number = intval(str_replace("adult", "", str_replace("Gender", "", $key)));
        $adult_gender[$adult_number] = $value;
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
                $Children_age = $value !== '' ? intval($value) : null;

                // add age to the array
               // this code is okay but wont be used: $child_age[] = "Child".$child_agenumber."age is :".$Children_age;
                
                $child_age[$child_agenumber] = $Children_age;
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

 foreach ($adult_first_names as $key => $first_name) {
    DB::table('family_demographics')->insert([
        'firstname' => $first_name,
        'lastname' => $adult_last_names[$key] ?? '', // Handle missing last name
        'age' => $adult_age[$key] ?? null, // Handle missing age
        'gender' => $adult_gender[$key] ?? '', // Handle missing gender
        'family_id' => $familyId // Ensure $familyId is defined and valid
    ]);
}

 


        // $fd_data = array('firstname' => $adult_first_names, 'firstname' => $child_first_names, 'lastname' => $adult_last_names, 'lastname' => $child_last_names, 'age' => $adult_age, 'age' => $child_age, 'gender' =>  $adult_gender , 'gender' => $child_gender);
        // DB::table('family_demographics') -> insert($fd_data);
 
    //dd([$adult_first_names, $adult_last_names, $adult_age, $adult_gender, $child_first_names,$child_last_names, $child_age,$child_gender]);

    /*======================THE ABOVE CODE IS FOR THE SECOND PART OF THE MULTI FORM IT WORKS ===================*/ 

// Retrieve existing quantities for all categories from the session
$existingQuantities = $req->session()->get('quantities', []);

// Get the current category ID (this will depend on how your categories are identified)
$categoryId = $req->input('category_id');

// Ensure there's an array for the current category in the session data
if (!isset($existingQuantities[$categoryId])) {
    $existingQuantities[$categoryId] = [];
}

// Loop through the new quantities provided by the user for the current category
foreach ($req->input('quantity', []) as $productId => $quantity) {
    // Ensure the quantity is valid (not null or empty)
    if ($quantity !== null && $quantity !== '') {
        // Create an array with product ID and its corresponding quantity
        $quantityData = [
            'productid' => $productId,
            'quantity' => $quantity
        ];

        // Check if the product already exists in the session for the current category
        $found = false;
        foreach ($existingQuantities[$categoryId] as &$existingQuantity) {
            if ($existingQuantity['productid'] == $productId) {
                // Update the quantity for the existing product
                $existingQuantity['quantity'] = $quantity;
                $found = true;
                break;
            }
        }

        // If the product is not found, add it to the current category's array in the session
        if (!$found) {
            $existingQuantities[$categoryId][] = $quantityData;
        }
    }
}

// Save the updated quantities back into the session
$req->session()->put('quantities', $existingQuantities);

// Output session data for debugging
echo "<pre>";
print_r($req->session()->get('quantities'));
dd("breakpoint");



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
    'orderItems' => $orderItems,
    


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
     'phone' =>$phone_num,
     'address' => $address,
     'receivedDate' => $received_date,
     'MoveInDate' =>  $moveInDate,
     'daterequested' =>  now() 
  ]);


 
    return redirect()->back()->with('success', 'Data inserted successfully.');
  
    }

    
}
