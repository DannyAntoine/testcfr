<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smallAppliances extends Model
{
    protected $table = 'smallappliances'; // this  is done when the database table is not plural otherwise its not needed  because laravle automatically assumes the table is plural 
    use HasFactory;
}
