<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listagency extends Model
{

     
    protected $table = 'agency'; // this  is done when the database table is not plural otherwise its not needed  because laravle automatically assumes the table is plural 
   
    use HasFactory;
}
