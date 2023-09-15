<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Bảng điều khiển</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Danh mục</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="categories">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category/create') }}">Thêm danh mục</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category') }}">Danh sách danh mục</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url("admin/brands") }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Hãng sản xuất</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-store menu-icon"></i>
          <span class="menu-title">Sản phẩm</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create') }}">Thêm sản phẩm</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">Danh sách sản phẩm</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/orders') }}">
          <i class="mdi mdi-sale menu-icon"></i>
          <span class="menu-title">Đơn hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/sliders') }}">
          <i class="mdi mdi-view-carousel menu-icon"></i>
          <span class="menu-title">Thanh trượt</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Tài khoản</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="users">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users/create') }}"> Thêm tài khoản </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users/') }}"> Danh sách tài khoản </a></li>
          </ul>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/settings') }}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Cài đặt trang</span>
        </a>
      </li> --}}
    </ul>
  </nav>
