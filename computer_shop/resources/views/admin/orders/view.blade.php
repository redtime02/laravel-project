@extends('layouts.admin')

@section('title', 'Chi tiết đơn hàng')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Chi tiết đơn hàng</h3>
                </div>
                <div class="card-body">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> Chi tiết đơn hàng
                            <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">Trở về</a>
                            <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">
                                Tải hóa đơn
                            </a>
                            <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">
                                Xem hóa đơn
                            </a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Thông tin đơn hàng</h5>
                                <hr>
                                <h6>Mã đơn: {{ $order->id }}</h6>
                                <h6>Mã vận đơn: {{ $order->tracking_no }}</h6>
                                <h6>Ngày đặt: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Hình thức thanh toán: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Tình trạng đơn hàng: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>Thông tin khách hàng</h5>
                                <hr>
                                <h6>Họ tên: {{ $order->fullname }}</h6>
                                <h6>Email: {{ $order->email }}</h6>
                                <h6>Số điện thoại: {{ $order->phone }}</h6>
                                <h6>Địa chỉ: {{ $order->address }}</h6>
                                <h6>Mã bưu điện: {{ $order->pincode }}</h6>
                            </div>
                        </div>
                        <br/>
                        <h5>Chi tiết mặt hàng</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Mã sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if ($orderItem->product->productImages)
                                            <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                style="width: 50px; height: 50px" alt="">
                                            @else
                                            <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $orderItem->product->name }}</td>
                                        <td width="10%">{{ $orderItem->price }} VND</td>
                                        <td width="10%">{{ $orderItem->quantity }}</td>
                                        <td width="10%" class="fw-bold">{{ $orderItem->quantity * $orderItem->price}} VND</td>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Thành tiền:</td>
                                        <td colspan="1" class="fw-bold">{{ $totalPrice }} VND</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Tiến trình đơn hàng</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label for="">Cập nhật tình trạng đơn hàng</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Chọn tình trạng</option>
                                        <option value="in progress" {{ Request::get('status') ==  'in progress' ? 'selected':''}}>Đang xử lý</option>
                                        <option value="completed" {{ Request::get('status') ==  'completed' ? 'selected':''}}>Đã xác nhận</option>
                                        <option value="pending" {{ Request::get('status') ==  'pending' ? 'selected':''}}>Đang bị hoãn</option>
                                        <option value="cancelled" {{ Request::get('status') ==  'cancelled' ? 'selected':''}}>Đã hủy</option>
                                        <option value="out-for-delivery" {{ Request::get('status') ==  'out-for-delivery' ? 'selected':''}}>Đang giao</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br/>
                            <h4 class="mt-2">Tình trạng đơn hàng hiện tại: <span class="text-uppercase">{{ $order->status_message }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
