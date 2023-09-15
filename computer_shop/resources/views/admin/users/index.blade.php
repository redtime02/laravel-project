@extends('layouts.admin')

@section('title', 'Danh sách tài khoản')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Danh sách tài khoản
                    <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm text-white float-end">Thêm tài khoản</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="col-md-4 my-auto float-end mb-3">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="search" name="usearch" value="{{ Request::get('usearch') }}" placeholder="Nhập tên tài khoản" class="form-control" />
                            <button class="btn bg-primary" type="submit">
                                Tìm
                            </button>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID tài khoản</th>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role_as == '0')
                                    <label for="" class="badge btn-primary">Khách hàng</label>
                                @elseif ($user->role_as == '1')
                                    <label for="" class="badge btn-success">Quản trị viên</label>
                                @else
                                    <label for="" class="badge btn-danger">Không</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-success">
                                    Sửa
                                </a>
                                <a href="{{ url('admin/users/'.$user->id.'/delete') }}"
                                     onclick="return confirm('Bạn có chắc chắn rằng bạn muốn xóa tài khoản này?')" class="btn btn-sm btn-danger">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Không có tài khoản nào</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
