<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\upload;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller
{

   // save the edited document name

   /*public function saveNewDocumentName(Request $req, $id){

    
    $filename = $req -> input('filename');

    $fileID = upload::find($id);

    if(!$fileID) {
      return response() ->json(['error' => 'Document not found!'], 404);
    }

    if($fileID) {
      $fileID -> filename = $filename;
      $fileID -> save();
      
      session()->flash('notification', ['type' => 'success', 'message' => 'Changes made successfully']);
    } else {
      session()->flash('notification', ['type' => 'error', 'message' => 'Error in making changes']);
    }
    return redirect()-> back();
   }
  */

 
  public function saveNewDocumentName(Request $req, $id)
  {
      $filename = $req->input('filename');
  
      $fileID = Upload::find($id);
  
      if (!$fileID) {
          return response()->json(['error' => 'Document not found!'], 404);
      }
  
      $oldFileName = $fileID->filename;
  
      $fileID->filename = $filename;
      $fileID->save();
  
      $oldFilePath = 'public/uploads/' . $oldFileName;
      $newFilePath = 'public/uploads/' . $filename;
  
      if (Storage::exists($oldFilePath)) {
          Storage::move($oldFilePath, $newFilePath);
      } else {
          session()->flash('notification', ['type' => 'error', 'message' => 'File does not exist.']);
          return redirect()->back();
      }
  
      session()->flash('notification', ['type' => 'success', 'message' => 'Changes made successfully']);
  
      $customFileName = $filename; // use the edited filename
  
      $filePath = 'uploads/' . $filename;
      $fullPath = storage_path('app/public/' . $filePath);
  
      if (file_exists($fullPath)) {
          return response()->download($fullPath, $customFileName)->deleteFileAfterSend(true);
      } else {
          session()->flash('notification', ['type' => 'error', 'message' => 'File does not exist.']);
          return redirect()->back();
      }
  }
  
  
  

  

  


  // delete file from the uploads table

  public function deleteFile($id){
    $file = upload::find($id);

    if($file) {
      $file ->delete();
      session()->flash('notification', ['type' => 'success', 'message' => 'Evidence deleted successfully']);
    } else {
      session()->flash('notification', ['type' => 'error', 'message' => 'Sorry We did not find the file']);
    }

    return redirect() -> back();

  }


    public function uploadFile(Request $request)
    {
  // review space size and determine which is best for cloud hosting 
       $request -> validate ([
        'file' => 'required|mimes:png,jpeg,pdf|max:2048',
       
       ]);

       $fileModel = new upload;
    
       if($request -> file()) {

        $fileName = time(). '_'.$request -> file ->getClientOriginalName();
        $filePath = $request -> file ('file') -> storeAs('uploads', $fileName, 'public');
        $fileModel -> filename = time(). '_'. $request -> file -> getClientOriginalName();
        $fileModel -> document = '/storage/' . $filePath;
        $fileModel -> family_id = $request -> input('family_id');
      

         
        if($fileModel ->save()){
          session()->flash('notification', ['type' => 'success', 'message' => 'File uploaded Sucessfully ']);
        } else {
          session()->flash('notification', ['type' => 'error', 'message' => 'Error in uploading file']);
        }
        return redirect() -> back();


 
        
       }
    }

  


}
