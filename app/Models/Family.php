<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// this model is for the family table in the databse with the name headofhousehold
class Family extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'family';

  /// the name of the colums in  the family database
    protected $fillable = [
     

        'headofhousehold_firstname',
        'headofhousehold_lastname', 
        'phone', 
        'address',
        'numofAdults',
        'numofChildren'
    ];

    // the following two function defining the relationship between the models 
   public function demographics() {
    return $this ->hasMany(FamilyDemographics::class);
   }

   public function requestOrder(){
    return $this ->hasMany(RequestOrder::class);
   }


   public function notes()
{
    return $this->hasMany(notes::class, 'family_id');
}

   public function show($family_id) {

     // Retrieve the Family record based on the passed family_id value
     $family = Family::findOrFail($family_id);

     // Retrieve the family members based on the family_id
     $familyMembers = $family->members;
 
     // Retrieve the family's address
     $address = $family->address;
 
     // Pass the retrieved data to the 'profile' view
     return view('profile', compact('family', 'familyMembers', 'address'));
   }

}
