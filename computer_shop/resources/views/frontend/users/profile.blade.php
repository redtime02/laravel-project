@extends('layouts.app')

@section('title', 'Thông tin tài khoản')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>Thông tin tài khoản
                    <a href="{{ url('change-password') }}" class="btn btn-warning float-end">Đổi mật khẩu</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>
            <div class="col-md-10">

                @if (session('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="text-danger">{{$error}}</div>
                    @endforeach
                </div>
                @endif
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Chi tiết</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('profile') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Họ tên:</label>
                                    <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Email:</label>
                                    <input type="text" readonly value="{{ Auth::user()->email }}" name="email" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Số điện thoại:</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Mã bưu điện:</label>
                                    <input type="text" name="pincode" value="{{ Auth::user()->userDetail->pincode ?? '' }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Địa chỉ:</label>
                                    <input type="text" name="address" value="{{ Auth::user()->userDetail->address ?? '' }}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
