@section('title','Hãng sản xuất')

<div>

    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Danh sách hãng
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary btn-sm float-end">Thêm hãng</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="col-md-4 my-auto float-end mb-3">
                        <form action="" method="GET">
                            <div class="input-group">
                                <input type="search" wire:model="search" placeholder="Nhập tên hãng" class="form-control" />
                                <button class="btn bg-primary" type="submit">
                                    Tìm
                                </button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Hãng</th>
                                <th>Tên hãng</th>
                                <th>Danh mục</th>
                                <th>Slug</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    @if($brand->category)
                                        {{ $brand->category->name }}
                                    @else
                                        Không thuộc danh mục nào
                                    @endif
                                </td>
                                <td>{{ $brand->slug }}</td>
                                <td>{{ $brand->status == '1' ? 'Ẩn':'Hiện'}}</td>
                                <td>
                                    <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success">Sửa</a>
                                    <a href="#" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-sm btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Không tìm thấy hãng nào</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')

    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });
    </script>

@endpush
