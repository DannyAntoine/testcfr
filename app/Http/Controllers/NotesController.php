<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\pendingcases;
use App\Models\FamilyDemographicsModel;
use App\Models\RequestOrderModel;
use App\Models\Family;
use App\Models\notes;

use Illuminate\Support\Facades\Notification;



class NotesController extends Controller
{



/// this function creates a note
    public function postnotes(Request $request) {

       // get the currently logged- in user
       $user = Auth::user();


        $family_id = $request->input('family_id');

        
       $post = $request->input('textarea');
       $family_id = $request->input('family_id');
      $note = new notes();
      $note->note = $post;
       $note->family_id = $family_id;
      $note -> posted_by = $user -> username;
    


      if ($note->save()) {
        session()->flash('notification', ['type' => 'success', 'message' => 'Note saved successfully']);
      } else {
        session()->flash('notification', ['type' => 'error', 'message' => 'Error occurred while saving note']);
     }


       return redirect()->back();
    }

// this function deletes a note 

public function deleteNote($note_id)
  {
    $data = notes::find($note_id);
     
    if ($data) {
        $data->delete();
        session()->flash('notification', ['type' => 'success', 'message' => 'Note deleted successfully']);
    } else {
        session()->flash('notification', ['type' => 'error', 'message' => 'Note not found']);
    }

    return redirect()->back();
}




    // the following function is to edit a note
      public function editNote($note_id) {
        $note = notes::find($note_id);
        return response()->json([
            'noteContent' => $note->note
        ]);
    } 

    //  this is to have the note open on the textarea
public function editNoteForm($note_id)
{
    $note = notes::find($note_id);
  //  dd($note);
    if (!$note) {
        // Handle the case when the note is not found
        return redirect()->back()->with('error', 'Note not found!');
    }
   
    return redirect()->back()->with('Success', 'Accomplish');
  
}





public function saveEdits(Request $request, $note_id)
{
    $noteContent = $request->input('note_content');
    

    $noteinfo = notes::find($note_id);

   
    if (!$noteinfo) {
        return response()->json(['error' => 'Note not found!'], 404);
    } 

    if($noteinfo){
    $noteinfo->note = $noteContent;
    $noteinfo->save();
    session()->flash('notification', ['type' => 'success', 'message' => 'Note updated  successfully']);
    } else {
        session()->flash('notification', ['type' => 'error', 'message' => 'Error In updating note']);

    }

    return redirect()-> back();
}


   
}
