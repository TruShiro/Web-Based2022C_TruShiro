<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Product;

use App\Models\Category;

use App\Models\myCart;

use Auth;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//require login before access function
    }

    public function addcart(){
        $r=request();
        $addCart=mycart::create([
            'quantity'=>$r->quantity,
            'OrderID'=>'',
            'ProductID'=>$r->id,
            'UserID'=>Auth::id(),          

        ]);
        Return redirect()->route('productList');
    }

    public function view(){
        $carts=DB::table('my_carts')
        ->leftjoin('products','products.id','=','my_carts.productID')
        ->select('my_carts.quantity as cartQty','my_carts.id as cid','products.*')
        ->where('my_carts.orderID','=','')
        ->where('my_carts.userID','=',Auth::id())
        ->paginate(5);
        return view('myCart')->with('Products',$carts);
    }
}
