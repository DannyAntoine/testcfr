<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livingrooms extends Model
{
  
    protected $table = 'livingroom'; // this is done when the databse table is not plural 
    use HasFactory;
}
