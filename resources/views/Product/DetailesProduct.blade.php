@extends('Layout.masternavwithouthome')
@section('content')
   <body class="sub_page">

      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <div class="row">





              <div class="" align="center" style="margin-left:500px">

                 <div class="img-box">
                    <img src="{{asset("storage/$product->image")}}" alt="">
                 </div>
                 <div class="detail-box">

                    <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                        <label style="font-size: 17px ;color:black">
                        NameProduct:</label> {{$product->name}}
                    </h5>
                    <br>

                    <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                        <label style="font-size: 17px ;color:black">
                        Description: </label> {{$product->description}}
                      </h5>
                      <br>

                      <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                       <label style="font-size: 17px ;color:black">
                        ProductQuantity:</label> {{$product->quantity}}
                      </h5>
                      <br>

                      <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                        <label style="font-size: 17px ;color:black">
                        ProductPrice:</label> {{$product->price}}
                    </h5>
                    <form action="{{url('product/addcart',['product'=>$product->id])}}" method="post">
                        @csrf
                    <input type="number" name="quantityorder" style="width:60px" min="1" value="1">
                    <button class="btn btn-primary"type="submit">AddCart</button></form>
                 </div>
              </div>




        </div>

      <!-- end product section -->
      <!-- footer section -->
      @endsection
