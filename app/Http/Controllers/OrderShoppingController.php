<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Helper\Cart;
class OrderShoppingController extends Controller
{
    public function checkout ()
    {
        $auth = auth('cus')->user();
        return view('home.checkout', compact('auth'));
    }

    public function history ()
    {
        $auth = auth('cus')->user();
        $orders = $auth->orders()->paginate();
        return view('home.history', compact('auth','orders'));
    }

    public function post_checkout(Request $req, Cart $cart)
    {
        $form_data= $req->only('email','name','phone','address');
        $form_data['customer_id'] = auth('cus')->id();

        if($order = Order::create($form_data)) {

            foreach($cart->items as $item) {
                $detail_data = [
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity
                ];
                OrderDetail::create($detail_data);
            }

            session(['cart' => null]);
            return redirect()->route('home.index')->with('yes','Đặt hàng thành công');
        }
        return redirect()->back()->with('no','Đặt hàng thất bại');
    }
}
