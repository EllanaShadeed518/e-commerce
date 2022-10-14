<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   //cart
   public function addcart(Request $request,Product $product){
    if(Auth::id()){

$userid=Auth::id();
$productid=$product->id;
$quantityorder=$request->quantityorder;
Cart::create([ 'userid'=>$userid,
'productid'=>$productid,
'quantityorder'=>$quantityorder,]);

return redirect()->back();
   }


   else{
    return redirect('/login');
   }
}
public function showcart($userid){
    $count=Cart::where('userid',$userid)->count();//get count where userid column in cart table equal $userid
    $data=Cart::where('userid',$userid)->join('products','carts.productid','=','products.id')->get();//get data where id of user make ligin and get food data when join food table with carts table(where carts.foodid = food.id)
    $cartid=Cart::where('userid',$userid)->get();
    $totalprice=0;

    foreach($data as $d){
$totalprice+=($d->price)*($d->quantityorder);
    }
   //dd($totalprice);
   //dd($data);
   return view('Cart.showcart',compact('count','data','cartid','totalprice'));



        }
        public function deleteproductfromcart(Cart $cartid){
            $cartid->delete();
            return redirect()->back()->with(['status' => true , "message" => 'product deleted from cart successfully']);;
                    }
                    public function show_order(){
                        $user_id=Auth::id();
            $count=Cart::where('userid',$user_id)->count();
            $data=Order::where('userid',$user_id)->get();
                        if(Auth::id()){
                            return view('showuser_order',compact('count','data'));
                        }
                        else{
                            return view('login');
                        }
                    }
                    public function cancelorder(Order $orderid){
                        $orderid->delete();
                        return redirect()->back();
                    }

}
