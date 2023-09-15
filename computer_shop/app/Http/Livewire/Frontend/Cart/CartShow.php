<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity(int $cartId){
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->quantity > 1){
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Đã cập nhật số lượng',
                    'type' => 'success',
                    'status' => 200
                ]);
            }else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Số lượng không được nhỏ hơn 1',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã có lỗi xảy ra!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function incrementQuantity(int $cartId){
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            if($cartData->product->quantity > $cartData->quantity){
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Đã cập nhật số lượng',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
            else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Chỉ còn' .$cartData->product->quantity. 'sản phẩm',
                    'type' => 'success',
                    'status' => 200
                ]);
            }

        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã có lỗi xảy ra!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function removeCartItem(int $cartId){
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveData){
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã xóa sản phẩm',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Đã có lỗi xảy ra!',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
