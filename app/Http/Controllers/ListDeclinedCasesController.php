<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\declinecases;

class ListDeclinedCasesController extends Controller
{
    //


    public function showdeclinedcases() {   
        $declinedcases = declinecases::all();
        return view('decline', compact('declinedcases'));
    }
}
