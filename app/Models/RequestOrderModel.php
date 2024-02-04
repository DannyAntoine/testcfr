<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestOrderModel extends Model
{

    
    protected $table = 'requestorder'; // 


    protected $fillable = ['requestedItem', 'amountNeeded', 'daterequested'];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
    use HasFactory;
}
