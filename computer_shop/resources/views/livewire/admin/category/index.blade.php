
<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa danh mục</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyCategory">

                <div class="modal-body">
                    <h6>Bạn có chắc chắn rằng bạn muốn xóa danh mục này?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>

            </form>
          </div>
        </div>
    </div>

    <div class="row">
    <div class="col-md-12 grid-margin">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Danh sách danh mục
                    <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Thêm danh mục</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Tìm theo danh mục</label>
                            <input type="search" name="name" value="{{ Request::get('name') }}" placeholder="Nhập tên danh mục" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <button type="submit" class="btn btn-primary">Tìm</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status == '1' ? 'Ẩn':'Hiện' }}</td>
                            <td>
                                <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success">Sửa</a>
                                <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@push('script')

    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>

@endpush
