<!DOCTYPE html>
<html>
   <head>
    <base href="/public" >
     @include('Home.css')

   </head>
   <body>
    @include('Home.nav')

   


    <!-- ***** Header Area Start ***** -->

    <div id="top">
        <table  align ="center" bgcolor="#E9967A" style="margin-top:20px"  >
            <thead>
                <tr >
                    <th style="padding:10px"scope="col">#</th>
                    <th style="padding:10px" scope="col">ProductName</th>
                    <th style="padding:10px"scope="col">Price</th>
                    <th style="padding:10px"scope="col">Quantity</th>
                    <th style="padding:10px"scope="col">PaymentStatus</th>
                    <th style="padding:10px"scope="col">DeliveryStatus</th>
                    <th style="padding:10px"scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $data)
                    <tr>
                        <td style="padding:10px"scope="row">{{ $loop->iteration }}</td>
                        <td style="padding:10px">{{ $data->name}}</td>
                        <td style="padding:10px" >{{ $data->price }}</td>
                        <td style="padding:10px">{{ $data->productquantity	 }}</td>
                        <td style="padding:10px">{{ $data->payment_status }}</td>
                        <td style="padding:10px">{{ $data->delivery_status}}</td>
                        @if($data->delivery_status=="processing")
                  
                        <td><a href="{{url('cancelorder',['orderid'=>$data->id])}}"class="btn btn-primary" onclick="return confirm('Are You Sure Canceled This Order!!!!')">CancelOrder</a></td>
                        @else
          @endif<td><h4 style="color:red">Delivered</h4></td>


                    </tr>

                @empty

                @endforelse






           
        </tbody>
            </table>
        </div>
      


   
  

     
@include('Home.js')

   </body>
   </html>