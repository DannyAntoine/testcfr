<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchens extends Model
{
    protected $table = 'kitchen'; // this is done when the databse table is not plural 
    use HasFactory;
}
