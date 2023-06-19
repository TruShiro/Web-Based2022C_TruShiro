<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Product;

use App\Models\Category;

class ProductController extends Controller
{
    public function add(){
        $r=request();//get data from the html input
        $image=$r->file('productImage');   //step to upload image get the file input
        $image->move('images',$image->getClientOriginalName());   //images is the location                
        $imageName=$image->getClientOriginalName(); 

        $addProduct=Product::create([
            'name'=> $r->productName,
            'description' => $r ->productDescription,
            'quantity'=> $r ->productQuantity,
            'price'=> $r-> productPrice,
            'CategoryID' => "1",
            'image'=> $imageName, 
        ]);

        return view('addProduct2');
    } 

    public function view(){
        $viewProduct = Product::all();//Automatci write sql for u (Select all the product to u)
        return view('showProduct')->with('Products',$viewProduct); 
    }

    public function edit($id){
        $products=Product::all()->where('id',$id);
        //select all from products where id='$id'
        return view('editProduct')->with('Products',$products);
    }

    public function update(){
        $r=request();
        $product=Product::find($r->id);//retrive data from product

        if($r->file('productImage')!=''){//if user upload something !=
            $image=$r->file('productImage');        
            $image->move('images',$image->getClientOriginalName());   //images is the location (in public -> images)        
            $imageName=$image->getClientOriginalName(); 
            $product-> image = $imageName;

        }

        $product->name=$r->productName;//binding data with html input (Name:xxx)
        $product->description=$r->productDescription;
        $product->price=$r->productPrice;
        $product->quantity=$r->productQuantity;
        $product->save();//save the date to Mysql

        return redirect()->route('showProduct'); //if return page + function if not then use return view
    }

    public function delete($id){
        $product=Product::find($id);
        $product->delete();//delete from database where id=$id

        return redirect()->route('showProduct');
    }

    public function viewlist(){

        $viewProduct = Product::all();//Automatci write sql for u (Select all the product to u)
        return view('viewProduct')->with('Products',$viewProduct);
    }  
    
    public function productdetail($id){
        $products=Product::all()->where('id',$id);
        //select all from products where id='$id'
        return view('productDetail')->with('Products',$products);
    }

    public function addCart(){
        
    }
}
