@extends('layouts.admin')

@section('title','Thêm sản phẩm')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Thêm sản phẩm
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Trở về</a>
                </h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Thông tin</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">Thẻ SEO</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Chi tiết</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Ảnh sản phẩm</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Chọn danh mục</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Chọn hãng</label>
                                <select name="brand" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Mô tả</label>
                                <textarea name="small_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Mô tả chi tiết</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Giá gốc</label>
                                        <input type="text" name="original_price" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Giá bán</label>
                                        <input type="text" name="selling_price" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Số lượng</label>
                                        <input type="number" name="quantity" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Sản phẩm đang bán chạy</label>
                                        <input type="checkbox" name="trending" style="width: 10px; height: 10px;" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Sản phẩm nổi bật</label>
                                        <input type="checkbox" name="featured" style="width: 10px; height: 10px;" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Trạng thái</label>
                                        <input type="checkbox" name="status" style="width: 10px; height: 10px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Cập nhật hình ảnh</label>
                                <input type="file" name="image[]" multiple class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary float-end">Lưu</button>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
