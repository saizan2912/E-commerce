@extends('admin.layout.layout')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Sr.no</th>
            <th>Category Name</th>
            <th>Parent Category Name</th>
            <th>Category Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key=>$categorie)
        <tr>    
            <td>{{$key+1}}</td>
            <td>{{$categorie->name}}</td>
            <td>@if ($categorie->category_id)
            {{$categorie->parent->name}}</td>
            @else
                No Parent Category
            
            @endif
            <td>{{$categorie->created_at}}</td>
            <td>
                 <a href="{{route('category.edit',$categorie->id)}}" style="font-size: 17px;padding:5px;"><i class="fa fa-edit"></i></a>
                 <a href="javascript::void(0)" class="category_delete" data-id="{{$categorie->id}}" style="font-size: 17px;padding:5px;"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('footer-script')
<script>
    $('.category_delete').on('click', function () {
        if (confirm('Are you sure you want to delete?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('category.delete') }}',
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
