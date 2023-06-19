<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myCart extends Model
{
    use HasFactory;
    protected $fillable = ['ProductID','quantity','UserID','OrderID'];

    Public function MyCart(){
        return $this->belongsTo('App/Models/Product');
    }
}
