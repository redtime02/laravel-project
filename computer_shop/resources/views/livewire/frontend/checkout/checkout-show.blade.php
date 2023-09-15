<div>

    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Đặt hàng</h4>
            <hr>

            @if ($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Thông tin cá nhân
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Họ tên:</label>
                                <input type="text" wire:model.defer="fullname" id="fullname" class="form-control" placeholder="Nhập họ tên" />
                                @error('fullname') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Số điện thoại:</label>
                                <input type="number" wire:model.defer="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" />
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Địa chỉ email:</label>
                                <input type="email" wire:model.defer="email" id="email" class="form-control" placeholder="Nhập email" />
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Mã bưu chính:</label>
                                <input type="number" wire:model.defer="pincode" id="pincode" class="form-control" placeholder="Nhập mã bưu chính" />
                                @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Địa chỉ giao:</label>
                                <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Thành tiền :
                            <span class="float-end">{{ $this->totalProductAmount }} VND</span>
                        </h4>
                        <hr>
                        <small>* Các mặt hàng sẽ được giao đến trong vòng 2-3 ngày.</small>
                        <hr>

                        <div class="row">
                                <div class="col-md-12 mb-3" wire:ignore>
                                    <label>Chọn hình thức thanh toán: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Thanh toán bằng tiền mặt</button>
                                            {{-- <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button> --}}
                                        </div>
                                        <div class="tab-content col-md-9 text-center" id="v-pills-tabContent">
                                            <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                {{-- <h6></h6>
                                                <hr/> --}}
                                                <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Đặt hàng ngay
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">
                                                        Đang đặt
                                                    </span>
                                                </button>

                                            </div>
                                            {{-- <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                <hr/>

                                                {{-- <div>
                                                    @php
                                                        $vnd_to_usd = ($this->totalProductAmount)/23017;
                                                        $totalPaypal = round($vnd_to_usd,2);
                                                        \Session::put('totalPaypal',$totalPaypal);
                                                    @endphp


                                                </div>
                                                <a href="{{ route('processTransaction') }}" class="btn btn-warning text-center">Cash {{ \Session::get('totalPaypal') }}$ on PayPal</a> --}}
                                                {{-- <div id="paypal-button-container"></div>
                                            </div> --}}
                                        </div>
                                    </div>

                                </div>
                        </div>


                    </div>
                </div>

            </div>
            @else
                <div class="card card-body text-center shadow p-md-5">
                    <h4>Không có sản phẩm nào để thanh toán</h4>
                    <a href="{{ url('collections') }}" class="btn btn-warning">Mua Ngay</a>
                </div>
            @endif
        </div>
    </div>

</div>

@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AdOtUOMj1QrXwExOrTsrwZUpyyjAA8QVE1zbbcIFKb5RByJPo1QiUfMXPsX7e_Jiv1o6H_mM250OR4so&currency=USD"></script>

    <script>
        // paypal.Buttons({
        //     onClick()  {

        //         // Show a validation error if the checkbox is not checked
        //         if (!document.getElementById('fullname').value
        //             || !document.getElementById('phone').value
        //             || !document.getElementById('email').value
        //             || !document.getElementById('pincode').value
        //             || !document.getElementById('address').value
        //         ) {
        //             Livewire.emit('validationForAll');
        //             return false;
        //         } else {
        //             @this.set('fullname', document.getElementById('fullname').value);
        //             @this.set('email', document.getElementById('email').value);
        //             @this.set('phone', document.getElementById('phone').value);
        //             @this.set('pincode', document.getElementById('pincode').value);
        //             @this.set('address', document.getElementById('address').value);
        //         }
        //     },
        //   // Order is created on the server and the order id is returned
        // //   createOrder() {
        // //     return fetch("/my-server/create-paypal-order", {
        // //       method: "POST",
        // //       headers: {
        // //         "Content-Type": "application/json",
        // //       },
        // //       // use the "body" param to optionally pass additional order information
        // //       // like product skus and quantities
        // //       body: JSON.stringify({
        // //         cart: [
        // //           {
        // //             sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
        // //             quantity: "YOUR_PRODUCT_QUANTITY",
        // //           },
        // //         ],
        // //       }),
        // //     })
        // //     .then((response) => response.json())
        // //     .then((order) => order.id);
        // //   },
        //     createOrder: (data, actions) => {
        //         return actions.order.create({
        //             purchase_units: [{
        //                 amount: {
        //                     value: "{{ $this->totalProductAmount }}"
        //                 }
        //             }]
        //         });
        //     },
        //   // Finalize the transaction on the server after payer approval
        //   onApprove: (data, actions) => {
        //     return actions.order.capture().then(function(orderData) {
        //       // Successful capture! For dev/demo purposes:
        //       console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        //       const transaction = orderData.purchase_units[0].payments.captures[0];
        //       alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        //       // When ready to go live, remove the alert and show a success message within this page. For example:
        //       // const element = document.getElementById('paypal-button-container');
        //       // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        //       // Or go to another URL:  window.location.href = 'thank_you.html';
        //     });
        //   }
        // }).render('#paypal-button-container');
    </script>
@endpush
