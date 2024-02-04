<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  // the following code generates the current year 
  public function currentYear(){

    $current_year = date('Y');
    return view('requestform', ['current_year' => $current_year]);
}
}
