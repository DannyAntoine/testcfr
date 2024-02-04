<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miscellaneous extends Model
{
    protected $table = 'miscellaneous'; // this is done when the databse table is not plural 
    use HasFactory;
}
