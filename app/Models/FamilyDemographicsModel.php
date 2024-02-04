<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyDemographicsModel extends Model
{
    use HasFactory;
    
     public $timestamps = false;

    protected $table = 'family_demographics'; // 

    protected $fillable = [
        'family_id',
        'firstname',
        'lastname',
        'age',
        'gender'
    ];


    public function family(){
        return $this ->belongsTo(Family::class);
    }

}
