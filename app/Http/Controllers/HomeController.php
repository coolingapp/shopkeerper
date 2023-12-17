<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('index',compact('product'));
    }
    public function cart(){
        $user_id = auth()->id();
        $cart = Cart::where('user_id', $user_id)->get();
        return view('user.cart',compact('cart'));
    }
    public function insertcart($id)
    {

        if (auth()->check()) {
            $cart = Cart::where('product_id', $id)->first();
            if ($cart) {
                $cart->increment('Qty');
                return redirect()->back()->with('success', 'Added more successfully');
            } else {
                $product = Product::find($id);
                $user_id = auth()->id();
                $product_id =  $product->id;
                $product_name =  $product->product_name;
                $product_price =  $product->product_price;
                $product_category =  $product->product_category;
                $product_qty =  1;

                $cartItem = new Cart();
                $cartItem->product_id = $product_id;
                $cartItem->product_name = $product_name;
                $cartItem->product_price = $product_price;
                $cartItem->product_category = $product_category;
                $cartItem->Qty = $product_qty;
                $cartItem->user_id = $user_id;
                $cartItem->save();

                return redirect()->back()->with('success', 'Added to cart successfully');
            }
        }

        return redirect()->back()->with('success', 'Please login first');

    }

    public function productcancel($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
    public function productorder($user_id)
    {
        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            $order = new Order();
            $order->product_name = $cart->product_name;
            $order->product_price = $cart->product_price;
            $order->product_qty = $cart->Qty;
            $order->user_id = $user_id;
            $order->save();
        }
        Cart::where('user_id', $user_id)->delete();
        return redirect()->back()->with('success', 'Product order successfully');
    }
    public function order(){
        $user_id = auth()->id();
        $order = Order::where('user_id', $user_id)->get();
        return view('user.order',compact('order'));
    }

}
