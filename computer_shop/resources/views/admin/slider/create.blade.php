@extends('layouts.admin')

@section('title','Thêm thanh trượt')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Thêm thanh trượt
                    <a href="{{ url('admin/sliders') }}" class="btn btn-danger btn-sm text-white float-end">Trở về</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/sliders/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Mô tả</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Hình ảnh</label>
                        <input type="file" name="image" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Trạng thái</label> <br/>
                        <input type="checkbox" name="status" style="width:10px;height:10px" /> ( Có = Ẩn, Không = Hiện)
                    </div>
                    <div class="mb-3 float-end">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
