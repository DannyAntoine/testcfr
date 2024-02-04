<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class AddProductController extends Controller
{
    

    public function generateSKU($Product_name,$Description,$category,$Product_type,$id){

        return substr(Str::slug($Product_name),0,5).'-'.substr(Str::slug($Description),0,5).  '-'.substr(Str::slug($category),0,3). '-'.substr(Str::slug($Product_type), 0, 4) . '-' . $id;
    }
    

  /*  public function addItem(Request $request) {
        
           // get informationf from the from

           $Product_name = $request->input('Product_name');
           $Description  = $request->input('Description');
           $category     = $request->input('Category');
           $Product_type = $request->input('Product_type');
          // $SKU          = $request->input('SKU');
           $Monetary_value = $request->input('MonetaryValue');
           $Donatedvalue = $request->input('Donatedvalue');
           $Qty = $request->input('Qty');
           $avaliability = $request->input('Avaliability');

           

    // Create a new product instance
    $inventory = new Inventory();

   
            // Create a new product instance
            $inventory = new Inventory();
            $inventory->product_name = $Product_name;
            $inventory->product_description = $Description;
            $inventory->product_category = $category;
            $inventory->product_type = $Product_type;
           // $inventory->sku = $sku;
            $inventory->monetary_value = $Monetary_value;
            $inventory->donated_value  = $Donatedvalue;
            $inventory->qty = $Qty;
            $inventory->avaliability = $avaliability;
            
       
            
           if ($inventory->save()) {
            $id =$inventory ->id;
            dd($id);
           
            $sku = $this->generateSKU($Product_name, $Description, $category, $Product_type, $id);
            $inventory->sku =$sku;
            $inventory->save();
            
           session()->flash('notification',['type' => 'success', 'message' => 'Product was sucessfully added']);
        } else {

           session()->flash('notification',['type' => 'error', 'message' => 'Error occured while adding product']);
        }
            
            return redirect()->back();
        }
*/




    public function addItem(Request $request)
    {
        // Get information from the form
        $Product_name = $request->input('Product_name');
        $Description = $request->input('Description');
        $category = $request->input('Category');
        $Product_type = $request->input('Product_type');
        $Monetary_value = $request->input('MonetaryValue');
        $Donatedvalue = $request->input('Donatedvalue');
        $Qty = $request->input('Qty');
        $avaliability = $request->input('Avaliability');

        // Create a new product instance
        $inventory = new Inventory();

        $inventory->product_name = $Product_name;
        $inventory->product_description = $Description;
        $inventory->product_category = $category;
        $inventory->product_type = $Product_type;
        $inventory->monetary_value = $Monetary_value;
        $inventory->donated_value = $Donatedvalue;
        $inventory->qty = $Qty;
        $inventory->avaliability = $avaliability;

        // Save the record to generate the ID
        $inventory->save();

        // Now you can retrieve the ID
        $id = $inventory->id;

        // Generate the SKU and set it
        $sku = $this->generateSKU($Product_name, $Description, $category, $Product_type, $id);
        $inventory->sku = $sku;

        // Save the record again with the SKU
        $inventory->save();

        if ($inventory) {
            session()->flash('notification', ['type' => 'success', 'message' => 'Product was successfully added']);
        } else {
            session()->flash('notification', ['type' => 'error', 'message' => 'Error occurred while adding product']);
        }

        return redirect()->back();
    }
}

    




