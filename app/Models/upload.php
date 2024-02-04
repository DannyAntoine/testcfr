<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upload extends Model
{
    protected $table = 'uploads';

    protected $fillable = ["filename", "document","created_at", "updated_at", "family_id","id"];
    use HasFactory;
}
