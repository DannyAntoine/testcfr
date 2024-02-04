<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inventory;

class ListProductController extends Controller
{
    public function listProductData() {
      
        $listInventoryData = Inventory::all();
        return view('updateInventory', ['listInventoryData' => $listInventoryData ]);
    }
}



