@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4>
                            <i class="fa fa-shopping-cart text-dark"></i> Chi tiết đơn hàng
                            <a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end">Trở về</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Thông tin đơn hàng</h5>
                                <hr>
                                <h6>Mã đơn: {{ $order->id }}</h6>
                                <h6>Mã vận đơn: {{ $order->tracking_no }}</h6>
                                <h6>Ngày đặt hàng: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
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
                                <h6>Điạ chỉ: {{ $order->address }}</h6>
                                <h6>Mã bưu điện: {{ $order->pincode }}</h6>
                            </div>
                        </div>
                        <br/>
                        <h5>Chi tiết mặt hàng</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Mã hàng</th>
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
            </div>
        </div>
    </div>

@endsection
