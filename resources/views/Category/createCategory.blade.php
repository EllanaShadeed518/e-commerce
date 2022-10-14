@extends('Layout.masteradmin')
@section('content')

    <form action="{{ route('storeCategory') }}" class="w-50" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">NameCategory</label>
            <input type="text" name="category" @class(['form-control','is-invalid'=>$errors->has('category')]) id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('category')
            <div class="invalid-feedback">{{ $message }}</div>

            @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  @endsection
