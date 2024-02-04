<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fullfillmentcases extends Model
{
    protected $table = 'fullfillmentcases';

    public $timestamps = false;
    
    protected $fillable = [

        'family_id',
        'firstname', 
        'lastname', 
        'dateapproved'
       
    ];

    use HasFactory;
}
