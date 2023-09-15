@extends('layouts.admin')

@section('title','Sản phẩm')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Danh sách sản phẩm
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">Thêm sản phẩm</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="col-md-4 my-auto float-end mb-3">
                    <form action="" method="GET">
                        <div class="input-group">
                            <input type="search" name="psearch" value="{{ Request::get('psearch') }}" placeholder="Nhập tên sản phẩm" class="form-control" />
                            <button class="btn bg-primary" type="submit">
                                Tìm
                            </button>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if ($product->category)
                                    {{ $product->category->name }}
                                @else
                                    Không thuộc danh mục nào
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status == '1' ? 'Ẩn':'Hiện' }}</td>
                            <td>
                                <a href="{{ url('admin/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-success">Sửa</a>
                                <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Bạn có chắc chắn rằng bạn muốn xóa sản phẩm này?')" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Không có sản phẩm nào</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
