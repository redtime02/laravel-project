<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('frontend.orders.index', compact('orders'));
    }

    public function show($orderId){
        $order = Order::where('user_id',Auth::user()->id)->where('id',$orderId)->first();
        if($order){
            return view('frontend.orders.view', compact('order'));
        }else{
            return redirect()->back()->with('message','Không tìm thấy đơn hàng');
        }
    }

    public function destroy($orderId){
        // dd($orderId);
        // $order = Order::where('user_id',Auth::user()->id)->where('id',$orderId);
        // $product = Product::where();
        $order = Order::find($orderId);
        $order->status_message = "Đã hủy";
        $order->save();
        return redirect('/orders')->with('message','Xóa giao dịch thành công');
    }
}
