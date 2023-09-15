@extends('layouts.admin')

@section('title', 'Cài đặt giao diện')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

        @if (session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif
        <form action="{{ url('/admin/settings') }}" method="POST">
            @csrf

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Cài đặt giao diện trang web khách hàng</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Tên trang Web</label>
                            <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Link Web</label>
                            <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Tiêu đề trang</label>
                            <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $setting->meta_keyword ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $setting->meta_description ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Thông tin Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Địa chỉ</label>
                            <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? '' }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Số điện thoại *</label>
                            <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Số điện thoại 2</label>
                            <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email *</label>
                            <input type="text" name="email1" value="{{ $setting->email1 ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email 2</label>
                            <input type="text" name="email2" value="{{ $setting->email2 ?? '' }}" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Mạng xã hội</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Facebook</label>
                            <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Twitter</label>
                            <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Youtube</label>
                            <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white">Lưu cài đặt</button>
            </div>

        </form>
    </div>
</div>

@endsection
