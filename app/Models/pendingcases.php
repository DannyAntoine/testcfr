<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendingcases extends Model
{
    
    protected $table = 'pendingcase'; // this  is done when the database table is not plural otherwise its not needed  because laravle automatically assumes the table is plural 
    use HasFactory;
   
}
