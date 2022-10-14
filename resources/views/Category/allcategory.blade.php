@extends('Layout.masteradmin')
@section('content')
        <div style="margin-left: 200px;margin-top:50px ">

        <a href="{{ route('createCategory') }}" class="btn btn-outline-success" style="padding: 10px">Create Category </a>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NameOfCategory</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->category }}</td>

                    <td>
                        <div class="d-flex">



                            <form class="ms-2 delete-form" action="{{route('deletecategory',['category'=>$category->id])}}" method="GET">
                                @csrf

                                <input type="button" class="btn btn-sm btn-danger delete-button" value="Delete">

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
@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
   $( ".delete-button" ).click(function() {
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   let form=$('.delete-button').closest('.delete-form');
   form.submit();
  }
});
});

</script>
@endpush

