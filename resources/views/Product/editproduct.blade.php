@extends('Layout.masteradmin')
@section('content')
    <div  id ="ll"style="margin-left:1000px;">
        <x-app-layout>

        </x-app-layout> </div>
    <div class="container-scroller ">

@include('ADMIN.nav')

    <form action="{{ route('updateproduct', ['product' => $product->id]) }}" class="w-50" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="name" value="{{ $product->name }}"@class(['form-control','is-invalid'=>$errors->has('name')]) id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="number" name="price" value="{{ $product->price }}"@class(['form-control','is-invalid'=>$errors->has('price')]) id="exampleInputPassword1">
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Image</label>
            <img src="{{asset("storage/$product->image")}}" style="width:100px" alt="">
            <input type="file" name="image" @class(['form-control','is-invalid'=>$errors->has('image')]) id="images">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 @endsection
