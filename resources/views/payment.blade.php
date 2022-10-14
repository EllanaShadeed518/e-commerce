@extends('layout.masternavwithouthome')
@section('content')
    <form class="ms-2" action="{{ url('charge') }}" method="post" align="center">

        @csrf
       
        <input type="text" name="amount" value="">
        <div>
            <button type="submit" align="center" class="btn btn-outline-success">Pay Now</button>
        </div>
    </form>
@endsection