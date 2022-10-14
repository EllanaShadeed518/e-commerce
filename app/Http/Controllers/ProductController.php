<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
     //product
     public function viewallproduct(){
        $user_id=Auth::id();
        $count=Cart::where('userid',$user_id)->count();
        $dataproduct=Product::paginate(6);
        return view('NavPages.ViewAllProduct',compact('dataproduct','count'));
    }
   public function DetailesProduct(Product $product){
    $user_id=Auth::id();
    $count=Cart::where('userid',$user_id)->count();
return view('Product.DetailesProduct',compact('product','count'));
   }
}
