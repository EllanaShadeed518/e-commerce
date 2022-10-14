<?php

namespace App\Http\Controllers;

use \PDF;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\products\storeproductrwquest;


class AdminController extends Controller
{
    //Category
    public function dislaycategories(){
        $categories=Category::all();
        return view('Category.allcategory',compact('categories'));
      }
      public function createcategory(){


            return view('Category.createCategory');

      }
     public function  storeCategory(Request $request){

        $category =$request->validate([
            'category' =>'required',

        ]);

        Category::create($category);
        return redirect()->route('dislaycategories')->with(['status' => true , "message" => 'category created successfully']);
     }
     public function deletecategory(Category $category)
  {
      $category->delete();
      return redirect()->route('dislaycategories')->with(['status' => true , "message" => 'category deleted successfully']);
  }
  //Product
  public function displayproduct(){
    $products=Product::all();
    return view('Product.allproduct',compact('products'));
  }
  public function createproduct(){


        return view('Product.createproduct');

  }
 public function  storeproduct(storeproductrwquest $request){

    $product=$request->validate([

       'image' => 'required|image|mimes:png,jpg,gif',
    ]);


$filename=Storage::putFile("productimage",$product['image']);//هذا السطر بخزن الصورة نفسها داخل ملف اسمه فوداماج هوي بعمله داخل الستورج وبشفر الصورة وبحط امتداه
//dd( $filename);
$product['image']=$filename;//اخلي الاسم بالداتا بيس هوي الاسم الجديد للصورة بعد التشفير
//dd($request->all());
    product::create([
        'name'=>$request->name,
        'price'=>$request->price,
        'description'=>$request->description,
        'quantity'=>$request->quantity,
        'image'=>$product['image'],
    ]);
    return redirect()->route('displayproduct')->with(['status' => true , "message" => 'product created successfully']);
 }
 public function deleteproduct(product $product)
 {
   storage::delete($product->image);
     $product->delete();
     return redirect()->route('displayproduct')->with(['status' => true , "message" => 'product deleted successfully']);
 }
 public function editproduct(product $product){
   return view('Product.editproduct',compact('product'));
 }
 public function updateproduct(Request $request,product $product){
   $data =$request->validate([
       'name' =>'required',
       'price' => 'required',
       'image' => 'image|mimes:png,jpg,gif',

   ]);

   if($request->has('image')){
       storage::delete($product->image);
       $filename=Storage::putFile("productimage",$data['image']);//هذا السطر بخزن الصورة نفسها داخل ملف اسمه فوداماج هوي بعمله داخل الستورج وبشفر الصورة وبحط امتداه
       //dd( $filename);
$data['image']=$filename;//اخلي الاسم بالداتا بيس هوي الاسم الجديد للصورة بعد التشفير
   }

$product->update($data);

return redirect()->route('displayproduct')->with(['status' => true , "message" => 'product updated successfully']);








 }
 //Order
 public function adminorder(){
    $data=Order::all();
    return view('Order.allorders',compact('data'));
 }
 public function delivered(Order $orderid ){
   // dd($orderid);
    $orderid->delivery_status="delivered";
    $orderid->payment_status="paid";
    $orderid->save();
    return redirect()->back();

 }
 public  function print(Order $orderid ){
  $pdf=PDF::loadView('pdf',compact('orderid'));//when i click in print button i go to file (pdf and download file have the pdf content and name to the file download is orders.detailes.pdf)
  return $pdf->download('orders.detailes.pdf');

  }

  public function search(Request $request){

    $username=$request->name;
    //dd($username);
    $AllOrders=Order::all();
    //dd($AllOrders);
    foreach($AllOrders as $order){
        
if($username){
    $data=Order::where('name',$username)->get();
    //dd($data);
    return view('Order.allorders',compact('data'));
}
else{
    return redirect()->back()->with(['status' => true , "message" => 'No Data Found For This User']);
}
    }

  }
  public function dashboardadmin(){
    $countproduct=Product::count();
    $countorder=Order::count();
    $users=User::all();
    $countcustomers=0;
    foreach($users as $user){
        if($user->user_type == 0){
$countcustomers+=1;
        }
    }
    $data=Order::all();
    $totalprice=0;
    $totaldelivered=0;
    $totalproceessing=0;
    foreach($data as $d){
$totalprice+=$d->price;
if($d->delivery_status == 'delivered'){
    $totaldelivered+=1;
            }
            else{
                $totalproceessing+=1;
            }


    }



    //dd($countproduct);
    return view("dashboardadmin",compact('countproduct','countorder','countcustomers','totalprice','totaldelivered','totalproceessing'));
  }
}
