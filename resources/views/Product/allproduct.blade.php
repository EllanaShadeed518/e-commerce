@extends('Layout.masteradmin')
@section('content')
<div style="margin-left: 200px;margin-top:50px ">
    <a href="{{ route('createproduct') }}" class="btn btn-outline-success" style="padding: 10px">Create Product</a>


<table class="table table-hover table-striped">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">NameOfProduct</th>
        <th scope="col">Description</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
    </tr>
</thead>
<tbody>
    @forelse ( $products as $product)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td><img src="{{ asset("storage/$product->image") }}"></td>
            <td>
                <div class="d-flex">
                    <form action="{{route('editproduct',['product'=>$product->id])}}" method="GET">
                        @csrf
                        <button class="btn btn-sm btn-info">Edit</button>
                    </form>



                </div>
            </td>

        </tr>
    @empty

    @endforelse

</tbody>
</table>


    </div>
 @endsection
