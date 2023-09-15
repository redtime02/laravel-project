<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $quantityCount = 1;

    public function addToWishList($productId){
        //dd($productId);
        if(Auth::check()){
            if(Wishlist::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                // session()->flash('message', 'Already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Sản phẩm đã có sẵn trong danh sách yêu thích',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else{
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                // session()->flash('message','Wishlist Added Successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Thêm sản phẩm thành công',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else{
            // session()->flash('message', 'Please Login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Vui lòng đăng nhập',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function decrementQuantity(){
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function incrementQuantity(){
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }
    }

    public function addToCart(int $productId){
        if(Auth::check()){
            //dd($productId);
            if($this->product->where('id',$productId)->where('status','0')->exists()){
                if(Cart::where('user_id',auth()->user()->id)->where('product_id',$productId)->exists()){
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Sản phẩm đã có trong giỏ hàng',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                }
                else{
                    if ($this->product->quantity > 0) {
                        if($this->product->quantity > $this->quantityCount){
                            // Insert Product to Cart
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);
                            $this->emit('CartAddedUpdated');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Thêm vào giỏ hàng thành công',
                                'type' => 'success',
                                'status' => 200
                            ]);
                        }
                        else{
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Chỉ còn '.$this->product->quantity.'sản phẩm',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                    else{
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Sản phẩm đã hết hàng',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
            }
            else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Sản phẩm không tồn tại',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Vui lòng đăng nhập',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
    public function mount($category, $product){
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
