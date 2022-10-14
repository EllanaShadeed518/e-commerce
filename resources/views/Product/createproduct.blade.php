@extends('Layout.masteradmin')
@section('content')

    <form action="{{ route('storeproduct') }}" class="w-50" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NameOfProduct</label>
            <input type="text" name="name" @class(['form-control','is-invalid'=>$errors->has('name')]) id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descriptin</label>
            <input type="text" name="description" @class(['form-control','is-invalid'=>$errors->has('description')]) id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">QuantityOfProduct</label>
            <input type="number" name="quantity" @class(['form-control','is-invalid'=>$errors->has('quantity')]) id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="number" name="price" @class(['form-control','is-invalid'=>$errors->has('price')]) id="exampleInputPassword1">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Image</label>
            <input type="file" name="image" @class(['form-control','is-invalid'=>$errors->has('image')]) id="images">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 @endsection
