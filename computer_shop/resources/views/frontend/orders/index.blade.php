@extends('layouts.app')

@section('title', 'Lịch sử giao dịch')

@section('content')

    {{-- <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa giao dịch</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroy">

                <div class="modal-body">
                    <h6>Bạn có chắc chắn rằng bạn muốn hủy giao dịch này?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>

            </form>
        </div>
        </div>
    </div> --}}

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4"> Lịch sử giao dịch </h4>
                        <hr>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Tất cả</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing-tab-pane" type="button" role="tab" aria-controls="processing-tab-pane" aria-selected="false">Đang xử lý</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery-tab-pane" type="button" role="tab" aria-controls="delivery-tab-pane" aria-selected="false">Đang giao</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane" type="button" role="tab" aria-controls="pending-tab-pane" aria-selected="false">Đang bị hoãn</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="success-tab" data-bs-toggle="tab" data-bs-target="#success-tab-pane" type="button" role="tab" aria-controls="success-tab-pane" aria-selected="false">Đã xác nhận</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel-tab-pane" type="button" role="tab" aria-controls="cancel-tab-pane" aria-selected="false">Đã hủy</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Mã đơn</th>
                                            <th>Mã vận đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Hình thức thanh toán</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tình trạng đơn hàng</th>
                                            <th>Hành động</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $item)
                                                @if ($item->status_message != "Đã hủy")
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->tracking_no }}</td>
                                                    <td>{{ $item->fullname }}</td>
                                                    <td>{{ $item->payment_mode }}</td>
                                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $item->status_message }}</td>
                                                    <td>
                                                        <a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a>
                                                        @if ($item->status_message == "Đang xử lý" || $item->status_message == "Đang bị hoãn")
                                                            <a href="{{ url('orders/'.$item->id.'/delete') }}" onclick="return confirm('Bạn có chắc chắn rằng bạn muốn xóa giao dịch này?')" class="btn btn-danger btn-sm">Xóa</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                            @empty
                                                <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 show" id="processing-tab-pane" role="tabpanel" aria-labelledby="processing-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Mã đơn</th>
                                            <th>Mã vận đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Hình thức thanh toán</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tình trạng đơn hàng</th>
                                            <th>Hành động</th>
                                        </thead>
                                        <tbody>

                                                @forelse ($orders as $item)
                                                    @if ($item->status_message == "Đang xử lý")
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->tracking_no }}</td>
                                                        <td>{{ $item->fullname }}</td>
                                                        <td>{{ $item->payment_mode }}</td>
                                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                        <td>{{ $item->status_message }}</td>
                                                        <td>
                                                            <a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a>
                                                            <a href="{{ url('orders/'.$item->id.'/delete') }}" class="btn btn-danger btn-sm">Xóa</a>
                                                        </td>
                                                    </tr>
                                                    @else
                                                    {{-- <tr>
                                                        <td colspan="7">Không có giao dịch nào</td>
                                                    </tr> --}}
                                                    @endif
                                                    {{-- <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->tracking_no }}</td>
                                                        <td>{{ $item->fullname }}</td>
                                                        <td>{{ $item->payment_mode }}</td>
                                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                        <td>{{ $item->status_message }}</td>
                                                        <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                                    </tr> --}}
                                                @empty
                                                    <tr>
                                                        <td colspan="7">Không có giao dịch nào</td>
                                                    </tr>
                                                @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 show" id="delivery-tab-pane" role="tabpanel" aria-labelledby="delivery-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Mã đơn</th>
                                            <th>Mã vận đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Hình thức thanh toán</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tình trạng đơn hàng</th>
                                            <th>Hành động</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $item)
                                                @if ($item->status_message == "Đang giao")
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->tracking_no }}</td>
                                                    <td>{{ $item->fullname }}</td>
                                                    <td>{{ $item->payment_mode }}</td>
                                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $item->status_message }}</td>
                                                    <td>
                                                        <a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a>
                                                    </td>
                                                </tr>
                                                @else
                                                {{-- <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
                                                </tr> --}}
                                                @endif
                                            {{-- <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->tracking_no }}</td>
                                                <td>{{ $item->fullname }}</td>
                                                <td>{{ $item->payment_mode }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>{{ $item->status_message }}</td>
                                                <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                            </tr> --}}
                                            @empty
                                                <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 show" id="pending-tab-pane" role="tabpanel" aria-labelledby="pending-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Mã đơn</th>
                                            <th>Mã vận đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Hình thức thanh toán</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tình trạng đơn hàng</th>
                                            <th>Hành động</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $item)
                                                @if ($item->status_message == "Đang bị hoãn")
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->tracking_no }}</td>
                                                    <td>{{ $item->fullname }}</td>
                                                    <td>{{ $item->payment_mode }}</td>
                                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $item->status_message }}</td>
                                                    <td>
                                                        <a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a>
                                                        <a href="{{ url('orders/'.$item->id.'/delete') }}" class="btn btn-danger btn-sm">Xóa</a>
                                                    </td>
                                                </tr>
                                                @else
                                                {{-- <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
                                                </tr> --}}
                                                @endif
                                            {{-- <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->tracking_no }}</td>
                                                <td>{{ $item->fullname }}</td>
                                                <td>{{ $item->payment_mode }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>{{ $item->status_message }}</td>
                                                <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                            </tr> --}}
                                            @empty
                                                <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 show" id="success-tab-pane" role="tabpanel" aria-labelledby="success-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Mã đơn</th>
                                            <th>Mã vận đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Hình thức thanh toán</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tình trạng đơn hàng</th>
                                            <th>Hành động</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $item)
                                                @if ($item->status_message == "Đã xác nhận")
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->tracking_no }}</td>
                                                    <td>{{ $item->fullname }}</td>
                                                    <td>{{ $item->payment_mode }}</td>
                                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $item->status_message }}</td>
                                                    <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                                </tr>
                                                @else
                                                {{-- <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
                                                </tr> --}}
                                                @endif
                                            {{-- <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->tracking_no }}</td>
                                                <td>{{ $item->fullname }}</td>
                                                <td>{{ $item->payment_mode }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>{{ $item->status_message }}</td>
                                                <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                            </tr> --}}
                                            @empty
                                                <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3 show" id="cancel-tab-pane" role="tabpanel" aria-labelledby="cancel-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Mã đơn</th>
                                            <th>Mã vận đơn</th>
                                            <th>Khách hàng</th>
                                            <th>Hình thức thanh toán</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tình trạng đơn hàng</th>
                                            <th>Hành động</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $item)
                                                @if ($item->status_message == "Đã hủy")
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->tracking_no }}</td>
                                                    <td>{{ $item->fullname }}</td>
                                                    <td>{{ $item->payment_mode }}</td>
                                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $item->status_message }}</td>
                                                    <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                                </tr>
                                                @else
                                                {{-- <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
                                                </tr> --}}
                                                @endif
                                            {{-- <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->tracking_no }}</td>
                                                <td>{{ $item->fullname }}</td>
                                                <td>{{ $item->payment_mode }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                                <td>{{ $item->status_message }}</td>
                                                <td><a href="{{ url('orders/'.$item->id) }}" class="btn btn-primary btn-sm">Xem</a></td>
                                            </tr> --}}
                                            @empty
                                                <tr>
                                                    <td colspan="7">Không có giao dịch nào</td>
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
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>

@endpush
