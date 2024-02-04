<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Kitchens; // call the model name form the model folder 
use App\Models\livingrooms; 
use App\Models\bedrooms;
use App\Models\miscellaneous;
use App\Models\babies;
use App\Models\smallAppliances;
use App\Models\beddings;
use App\Models\baths;
use App\Models\agencyModel;
use App\Models\Family;




// this will be the  controller used to pull from the database since it is not necessary to use a controller for each table
// we will just create fuction that link to the particualr table  and since they are going to be displayed on one view then this is practical 
class orderitemController extends Controller
{
    // the following code creates a function to pull  items  from the database 
    public function showkitchenitems(){
       
        $kitchendata = Kitchens::all();
        $livingroomdata = livingrooms::all();
        $bedroomdata = bedrooms::all();
        $miscsdata = miscellaneous::all();
        $babydata = babies::all();
        $smallAppliancesdata = smallAppliances::all();
        $beddingdata = beddings::all();
        $bathdata = baths::all();
        $agencydata =agencyModel::all();
        
       
      
       
       
        //calling multiple items and passing them to the request view 
        return view('requestform',['kitchens' => $kitchendata,'livingrooms' => $livingroomdata, 'bedrooms' => $bedroomdata,'miscellaneous' => $miscsdata, 
        'babies' => $babydata,'smallAppliances' => $smallAppliancesdata,'beddings' => $beddingdata, 'baths' => $bathdata, 'agencyModel' => $agencydata, ]);
    }

 
}
