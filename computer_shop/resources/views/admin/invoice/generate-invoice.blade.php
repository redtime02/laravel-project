<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hóa đơn #{{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: DejaVu Sans !important;;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: DejaVu Sans !important;;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: DejaVu Sans !important;;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: DejaVu Sans !important;;
        }
        .small-heading {
            font-size: 18px;
            font-family: DejaVu Sans !important;;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: DejaVu Sans !important;;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: DejaVu Sans !important;;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #2874f0;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Computer Shop</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Mã đơn: #{{ $order->id }}</span> <br>
                    <span>Ngày: {{ date('d/m/Y')}}</span> <br>
                    <span>Mã bưu điện: {{ $order->pincode }}</span> <br>
                    <span>Địa chỉ: Cần Thơ</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Thông tin hóa đơn</th>
                <th width="50%" colspan="2">Thông tin khách hàng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mã đơn:</td>
                <td>{{ $order->id }}</td>

                <td>Họ tên:</td>
                <td>{{ $order->fullname }}</td>
            </tr>
            <tr>
                <td>Mã vận đơn:</td>
                <td>{{ $order->tracking_no }}</td>

                <td>Email:</td>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <td>Ngày đặt:</td>
                <td>{{ $order->created_at->format('d-m-Y h:i A') }}</td>

                <td>Số điện thoại:</td>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <td>Hình thức thanh toán:</td>
                <td>{{ $order->payment_mode }}</td>

                <td>Địa chỉ:</td>
                <td>{{ $order->address }}</td>
            </tr>
            {{-- <tr>
                <td>Order Status:</td>
                <td>{{ $order->status_message }}</td>

                <td>Pin code:</td>
                <td>{{ $order->pincode }}</td>
            </tr> --}}
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Chi tiết hóa đơn
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Tổng cộng</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
            @foreach ($order->orderItems as $orderItem)
            <tr>
                <td width="10%">{{ $orderItem->id }}</td>
                <td>{{ $orderItem->product->name }}</td>
                <td width="10%">{{ $orderItem->price }} VND</td>
                <td width="10%">{{ $orderItem->quantity }}</td>
                <td width="15%" class="fw-bold">{{ $orderItem->quantity * $orderItem->price}} VND</td>
                @php
                    $totalPrice += $orderItem->quantity * $orderItem->price;
                @endphp
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="total-heading">Thành tiền: </td>
                <td colspan="1" class="total-heading">{{ $totalPrice }} VND</td>
            </tr>
        </tbody>
    </table>

    <br>


</body>
</html>
