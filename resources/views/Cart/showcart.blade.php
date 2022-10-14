@extends('Layout.masternavwithouthome')







@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->

    <div id="top">
        <table  align ="center" bgcolor="#E9967A" style="margin-top:20px"  >
            <thead>
                <tr >
                    <th style="padding:10px"scope="col">#</th>
                    <th style="padding:10px" scope="col">ProductName</th>
                    <th style="padding:10px"scope="col">Price</th>
                    <th style="padding:10px"scope="col">Quantity</th>
                    <th style="padding:5px;width:20px" scope="col">Image</th>
                    <th style="padding:10px"scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($data as $data)
                    <tr>
                        <td style="padding:10px"scope="row">{{ $loop->iteration }}</td>
                        <td style="padding:10px">{{ $data->name}}</td>
                        <td style="padding:10px" >{{ $data->price }}</td>
                        <td style="padding:10px">{{ $data->quantityorder }}</td>
                        <td><img src="{{ asset("storage/$data->image") }}"></td>



                    </tr>

                @empty

                @endforelse






            @foreach ($cartid as $cartid)
            <tr style="position: relative;top:-100px;right:-390px">
         <td style="padding:10px">

                    <a href="{{ route('deleteproductfromcart', ['cartid' => $cartid->id]) }}" >Delete</a>



         </td>
        </tr>
            @endforeach
        </tbody>
            </table>
        </div>
        
        <div align="center" style="margin-top: 10px" >
            <h5   >TotalPrice:{{$totalprice}}</h5>
                    </div>
               <div align="center" style="margin-top: 10px" >     <h5 style="font-size:20px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;color:red">Proccesed To Order</h5></div>
        <div align="center" style="margin-top: 10px" >
<button class="btn btn-danger p-1 mb-5"  name ="cash"id="order" >Cash Order Delivery</button>


            <a class="btn btn-danger p-1 mb-5" name="card" href="{{url('payment')}}" >Pay Using Card</a>
                    </div>
        
        <div style="margin-top: 10px;display:none" id="show" >
            <form align ="center" method="post"  action="{{route('order',['userid'=>Auth::user()->id])}}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text"  name="name" id="name" placeholder="Enter Name" >

                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number"  name="phone" id="phone" placeholder="Enter Phone Number" >

                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text"  name="address" id="address" placeholder="Enter Address">

                  </div>
                  <div>

                <button type="submit" class="btn btn-primary">Order Confirm</button>
                <button type="button" class="btn btn-danger" id="close">Close</button></div>
              </form>
                    </div>


   @endsection
   @push('custom-scripts')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
    $(document).ready(function(){
$("#order").click(function(){
$("#show").show();
});
});
$(document).ready(function(){
$("#close").click(function(){
$("#show").hide();
});
});

      </script>
@endpush
