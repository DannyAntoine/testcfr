<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    protected $table = 'notes'; // this is done when the databse table is not plural 
    protected $primaryKey = 'note_id';
    use HasFactory;
}
