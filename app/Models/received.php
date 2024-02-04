<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class received extends Model
{

    public $timestamps = false;
    protected $table = 'received'; // this  is done when the database table is not plural otherwise its not needed  because laravle automatically assumes the table is plural 
    protected $primaryKey = 'id';

    use HasFactory;
   

}
