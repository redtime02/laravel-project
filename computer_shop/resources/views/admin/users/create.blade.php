@extends('layouts.admin')

@section('title', 'Thêm tài khoản')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Thêm tài khoản
                    <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm text-white float-end">Trở về</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Họ tên</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Mật khẩu</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Chọn vai trò</label>
                            <select name="role_as" class="form-control">
                                <option value="">Chọn vai trò</option>
                                <option value="0">Khách hàng</option>
                                <option value="1">Quản trị viên</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
