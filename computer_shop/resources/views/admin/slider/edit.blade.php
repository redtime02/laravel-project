@extends('layouts.admin')

@section('title','Sửa thanh trượt')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Sửa thanh trượt
                    <a href="{{ url('admin/sliders/') }}" class="btn btn-danger btn-sm text-white float-end">Trở về</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="">Tiêu đề</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Mô tả</label>
                        <textarea name="description" class="form-control" rows="3">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Hình ảnh</label>
                        <input type="file" name="image" class="form-control" />
                        <img src="{{ asset("$slider->image") }}" style="width: 50px; height: 50px" alt="Slider">
                    </div>
                    <div class="mb-3">
                        <label for="">Trạng thái</label> <br/>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked':''}} style="width:10px;height:10px" /> ( Có = Ẩn, Không = Hiện)
                    </div>
                    <div class="mb-3 float-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
