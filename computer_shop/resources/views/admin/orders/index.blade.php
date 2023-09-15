@extends('layouts.admin')

@section('title', 'Đơn hàng')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Danh sách các đơn hàng</h3>
                </div>
                <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Tìm theo ngày</label>
                                    <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Tìm theo tình trạng đơn hàng</label>
                                    <select name="status" class="form-select">
                                        <option value="">Chọn tất cả</option>
                                        <option value="Đang xử lý" {{ Request::get('status') ==  'Đang xử lý' ? 'selected':''}}>Đang xử lý</option>
                                        <option value="Đã xác nhận" {{ Request::get('status') ==  'Đã xác nhận' ? 'selected':''}}>Đã xác nhận</option>
                                        <option value="Đang bị hoãn" {{ Request::get('status') ==  'Đang bị hoãn' ? 'selected':''}}>Đang bị hoãn</option>
                                        <option value="Đã hủy" {{ Request::get('status') ==  'Đã hủy' ? 'selected':''}}>Đã hủy</option>
                                        <option value="Đang giao" {{ Request::get('status') ==  'Đang giao' ? 'selected':''}}>Đang giao</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Tìm theo tên khách hàng</label>
                                    <input type="search" name="name" value="{{ Request::get('name') }}" placeholder="Nhập tên khách hàng" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <br/>
                                    <button type="submit" class="btn btn-primary">Tìm</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>ID đơn hàng</th>
                                    <th>Mã vận đơn</th>
                                    <th>Tên khách hàng</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tình trạng đơn hàng</th>
                                    <th>Hành động</th>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->payment_mode }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $item->status_message }}</td>
                                            <td><a href="{{ url('admin/orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Không có đơn hàng nào</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
