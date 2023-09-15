<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id= NULL;

    // public $listeners = [
    //     'validationForAll'
    // ];

    public function rules(){
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|string|max:121',
            'phone' => 'required|string|max:11|max:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder(){
        $this->validate();
        $validatedData = $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => Str::random(20),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'Đang xử lý',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);

        foreach ($this->carts as $cartItem) {
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);
            $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
        }

        return $order;
    }


    public function codOrder(){
        $this->payment_mode = 'Thanh toán bằng tiền mặt';
        $codOrder = $this->placeOrder();
        if($codOrder){
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message','Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đặt hàng thành công',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã có lỗi xảy ra!',
                'type' => 'error',
                'status' => 500
            ]);

        }
    }


    // public function paidOnlineOrder(){
    //     $this->payment_mode = 'Paid by PayPal';
    //     $codOrder = $this->placeOrder();
    //     if($codOrder){
    //         Cart::where('user_id', auth()->user()->id)->delete();
    //         session()->flash('message','Order Placed Successfully');
    //         $this->dispatchBrowserEvent('message', [
    //             'text' => 'Order Placed Successfully',
    //             'type' => 'success',
    //             'status' => 200
    //         ]);
    //         return redirect()->to('thank-you');
    //     } else {
    //         $this->dispatchBrowserEvent('message', [
    //             'text' => 'Something Went Wrong',
    //             'type' => 'error',
    //             'status' => 500
    //         ]);

    //     }
    // }
    public function totalProductAmount(){
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->userDetail->phone;
        $this->address = auth()->user()->userDetail->address;
        $this->pincode = auth()->user()->userDetail->pincode;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
