<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Replay;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
//$dataproduct=Product::all();
$dataproduct=Product::paginate(6);
$user_id=Auth::id();
$count=Cart::where('userid',$user_id)->count();

$comments=Comment::all();
$replays=Replay::all();
        return view('NavPages.home',compact('dataproduct','count','comments','replays'));

    }

    public function redirect(){

          $userType = Auth::user()->user_type;//to check if is user is admin or any user
          if($userType==1){
        return view('adminhome');}
        else{
            $user_id=Auth::id();
            $dataproduct=Product::paginate(6);
            $count=Cart::where('userid',$user_id)->count();
$comments=Comment::all();
$replays=Replay::all();
            return view('NavPages.home',compact('count','dataproduct','comments','replays'));
        }

    }
    public function contact(){
        $user_id=Auth::id();

        $count=Cart::where('userid',$user_id)->count();
        return view('NavPages.contact',compact('count'));

    }
    public function about(){
        $user_id=Auth::id();

        $count=Cart::where('userid',$user_id)->count();
        return view('NavPages.about',compact('count'));

    }


        //order
        public function orderconfirm(Request $request,$userid){
            $data=Cart::where('userid',$userid)->join('products','carts.productid','=','products.id')->get();
            $name=$request->name;
            $phone=$request->phone;
            $address=$request->address;
           // dd($data);
//dd($userid);
$userid=Auth::id();

            foreach($data as $data){

            Order::create(
                [
                    'name'=>$name,
                    'phone'=>$phone,
                    'address'=>$address,
                    'userid'=>$userid,
                    'productname'=>$data->name,
'price'=>$data->price,
'productquantity'=>$data->quantityorder,




                ]
                );}

                $data2=Cart::where('userid',$userid);
                //dd($data2);
                $data2->delete();
                return redirect()->back();
        }
       
        //comment
     public function   createcomment(Request $request){

        $userid=Auth::id();
       $name=Auth::user()->name;

        Comment::create([
            'comment'=>$request->comment,
           'name'=>$name,
           'userid'=>$userid,


        ]);
        $comments=Comment::all();

        $dataproduct=Product::paginate(6);
$replays=Replay::all();
        $count=Cart::where('userid',$userid)->count();
        return view('NavPages.home',compact('comments','dataproduct','count','replays'));



         }
         public function   createreplay(Request $request){

                $userid=Auth::id();
               $name=Auth::user()->name;
            Replay::create([
                'comment'=>$request->replay,
                'comment_id'=>$request->commentid,
               'name'=>$name,
               'userid'=>$userid,


            ]);

           $dataproduct=Product::paginate(6);

        $count=Cart::where('userid',$userid)->count();
        $comments=Comment::all();
        $replays=Replay::all();

            return view('NavPages.home',compact('dataproduct','count','comments','replays'));

     }

    }
