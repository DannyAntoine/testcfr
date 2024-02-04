<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fullfillmentcases;


class listFulfillCasesController extends Controller
{
    // show fulfilledcases

    public function showfulfilledcases() {   
        $fulfillcases = fullfillmentcases::all();
     
        return view('fullfiledcases', compact('fulfillcases'));
    }
}
