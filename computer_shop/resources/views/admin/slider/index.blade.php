@extends('layouts.admin')

@section('title','Thanh trượt')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Danh sách thanh trượt
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white float-end">Thêm thanh trượt</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="col-md-4 my-auto float-end mb-3">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="search" name="ssearch" value="{{ Request::get('ssearch') }}" placeholder="Nhập tên thanh trượt" class="form-control" />
                            <button class="btn bg-primary" type="submit">
                                Tìm
                            </button>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID thanh trượt</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <img src="{{ asset("$slider->image") }}" style="width:70px;height:70px" alt="Slider">
                                </td>
                                <td>{{ $slider->status =='0' ? 'Hiện':'Ẩn' }}</td>
                                <td>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-success">Sửa</a>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" onclick="return confirm('Bạn có chắc chắn rằng bạn muốn xóa thanh trượt này?')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
