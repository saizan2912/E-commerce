@extends('admin.layout.layout')
@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Sr.no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key=>$user)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <a href="javascript::void(0)" class="user_delete" data-id="{{$user->id}}" style="font-size: 17px;padding:5px;"><i class="fa fa-trash"></i></a>
           </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@push('footer-script')
<script>
    $('.user_delete').on('click', function () {
        if (confirm('Are you sure you want to delete?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('user.delete') }}',
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

