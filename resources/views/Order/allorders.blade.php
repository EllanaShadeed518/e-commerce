@extends('Layout.masteradmin')
@section('content')
@push('styles')
<style>
.table{

    font-size: 2px;

}
</style>


@endpush
<div style="margin-left: 150px;margin-top:50px ">


@if (session('status'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif


<div style="margin-left: -160px" >
    <form action="{{url('searchorder')}}">
        <input type="text" name="name" style="color:blue">
        <button class="btn btn-primary">Search Order</button>
    </form>
<table class="table"   >
<thead>
    <tr >

        <th  scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">DataName</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">PaymentStatus</th>
        <th scope="col">DeliveryStatus</th>
        <th scope="col">Delivered</th>
        <th scope="col">PrintPDF</th>

    </tr>
</thead>
<tbody>
    @forelse ( $data as $data)
        <tr>

            <td>{{ $data->name }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->address }}</td>
            <td>{{ $data->productname }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->productquantity }}</td>
            <td>{{ $data->payment_status }}</td>
            <td>{{ $data->delivery_status }}</td>
            @if($data->delivery_status=="processing")
            <td><a href="{{url('delivered',['orderid'=>$data->id])}}"class="btn btn-primary" onclick="return confirm('Are You Sure Delivered This Order!!!!')">Delivered</a></td>
            @else
<td><h4 style="color:red">Delivered</h4></td>
            @endif
            <td><a href="{{url('print',['orderid'=>$data->id])}}" class="btn btn-success"style="font-size: 15px;padding:0px" >Print</a></td>

        </tr>
    @empty

    @endforelse

</tbody>
</table>


    </div>
   @endsection
