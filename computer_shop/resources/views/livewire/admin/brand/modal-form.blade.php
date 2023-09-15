<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm hãng</h1>
          <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">

            <div class="modal-body">
                <div class="mb-3">
                    <label for="">Chọn danh mục</label>
                    <select wire:model.defer="category_id" required class="form-control" id="">
                        <option value="">--Chọn danh mục--</option>
                        @foreach ($categories as $cateItem)
                        <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                        @endforeach

                    </select>
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Tên hãng</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control">
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Tình trạng</label>
                    <input type="checkbox" wire:model.defer="status" /> (Có = Ẩn , Không = Hiện)
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Brand Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật hãng</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Đang tải...</span>
            </div> Đang tải...
        </div>

        <div wire:loading.remove>

            <form wire:submit.prevent="updateBrand">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Chọn dang mục</label>
                        <select wire:model.defer="category_id" required class="form-control" id="">
                            <option value="">--Chọn dang mục--</option>
                            @foreach ($categories as $cateItem)
                            <option value="{{ $cateItem->id }}">{{ $cateItem->name }}</option>
                            @endforeach

                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Tên hãng</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Trạng thái</label>
                        <input type="checkbox" wire:model.defer="status" style="width:70px;height=70px;"/> (Có = Ẩn , Không = Hiện)
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

<!-- Brand Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa hãng</h1>
          <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Đang tải...</span>
            </div> Đang tải...
        </div>

        <div wire:loading.remove>

            <form wire:submit.prevent="destroyBrand">

                <div class="modal-body">
                    <h4>Bạn có chắc chắn rằng bạn muốn xóa hãng này?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
