<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;
use App\Models\FamilyDemographicsModel;
class SaveProfileEditsController extends Controller
{
    // this controller will be used to saved edits on the profile tab on the client profile

    public function SaveProfileEdits( Request $request, $id) {
     $profile = Family::find($id);

     
 
     if($profile) {
       
        $fieldIdentifier = $request->input('field_identifier');
        
        $Correction  = $request -> input('profilecanvas');
        // the following code will save the changes to the specific column to the db based on which link clicked 
        switch($fieldIdentifier){
            case 'headofhousehold_firstname' :
                $profile ->headofhousehold_firstname =$Correction;
                break;
            case 'headofhousehold_lastname':
                $profile->headofhousehold_lastname = $Correction;
                break;
            case 'Prefix':
                $profile-> Prefix = $Correction;
                break;
            case 'Gender':
                $profile -> Gender = $Correction;
                break;
            case 'phone':
                $profile -> phone = $Correction;
                break;
            case 'address':
                $profile ->address = $Correction;
                break;
            case 'Email':
                $profile -> Email = $Correction;
                break;
            case 'DOB':
                $profile -> DOB = $Correction;
                break;
            case 'MaritalStatus':
                $profile -> MaritalStatus = $Correction;
                break;
        }

       if($profile) {
        $profile ->save();
        session() ->flash('notification', ['type' => 'success', 'message' => 'Profile updated  successfully']);
       } else {
        session()->flash('notification', ['type' => 'error', 'message' => 'An error occured while updating the profile ']);
       }

       return redirect() -> back();
     }

    }




    public function SavefamdemoEdits(Request $req, $id){
 
        
         $ProfileFamilyDemographics = FamilyDemographicsModel::find($id);

     
         $firstnameCorrection  = $req -> input('name');
         $lastnameCorrection  = $req -> input('surname');
         $ageCorrection  = $req -> input('age');
         $genderCorrection  = $req -> input('gender');


        
            if($ProfileFamilyDemographics){

               
               

                $ProfileFamilyDemographics-> firstname = $firstnameCorrection;
                $ProfileFamilyDemographics-> lastname = $lastnameCorrection;
                $ProfileFamilyDemographics-> age = $ageCorrection ;
                $ProfileFamilyDemographics-> gender = $genderCorrection;
                
                 $ProfileFamilyDemographics ->save();
               

                session() ->flash('notification', ['type' => 'success', 'message' => 'Profile updated  successfully']);
            } else {
             session()->flash('notification', ['type' => 'error', 'message' => 'An error occured while updating the profile ']);
            }
            return redirect() -> back();
            
         }
    }


