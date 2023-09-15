@extends('layouts.app')

@section('title', 'Đăng ký thành công')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thông báo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bạn đã đăng nhập vào hệ thống!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
