@extends('admin.layout.layout')
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Sr.no</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Extra Details</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key=>$product)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$product->name}}</td>
            <td>
                {{-- Use the null coalescing operator to provide a default value --}}
                {{-- {{$product->category->name ?? 'N/A'}} --}}
                @if ($product->category_id)
                    {{$product->category->name}}
                @endif
            </td>
            <td>{{$product->price}}</td>
            <td>
                <img src="{{asset('uploads/'.$product->image)}}" style="height:80px;width:80px" alt="">
            </td>
            <td><button class="btn btn-info"><a href="{{route('product.extraDetails',$product->id)}}">Add</a></button></td>
            <td>
                <a href="{{route('product.edit',$product->id)}}" style="font-size: 17px;padding:5px;"><i class="fa fa-edit"></i></a>
                <a href="javascript::void(0)" class="product_delete" data-id="{{$product->id}}" style="font-size: 17px;padding:5px;"><i class="fa fa-trash"></i></a>
           </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('footer-script')
<script>
    $('.product_delete').on('click', function () {
        if (confirm('Are you sure you want to delete?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('product.delete') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Corrected syntax for the CSRF token
                    id: id,
                },
                success: function (data) {
                    location.reload(); // Corrected typo from 'relode' to 'reload'
                }
            });
        }
    });

</script>    
@endpush

