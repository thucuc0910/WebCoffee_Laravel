@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên nhân viên</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Loại</th>
                {{-- <th>Active</th> --}}
                <th>Update</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user) 
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->full_name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->email }}</td>
                {{-- <td>{!! \App\Helpers\Helper::active($user->active) !!}</td> --}}
                <td> @if ($user->type == 0) 
                        <p>Quản trị</p>
                        @elseif ($user->type == 1)
                        <p>Người dùng</p>
                    @endif
                </td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    {{-- <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{ $user->id }}">
                        <i class="fa fa-edit"></i>
                    </a> --}}
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{ $user->id }},'/admin/users/destroy')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
    {!! $users->links() !!}
    </div>
@endsection

