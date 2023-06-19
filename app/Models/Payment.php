<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['amount','creditCard','paymentStatus'];

    Public function payment(){
        return $this->belongsTo('App/Models/myOrder');
    }
}
