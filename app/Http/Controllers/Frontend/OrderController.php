<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToCart($id)
    {
        $product=Product::find($id);
        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
        ]);

        return redirect()->back()->with('success','Product added to cart');

    }

    public function viewCart()
    {
        $cart=Cart::content();
        return view('frontend.layouts.view-cart',compact('cart'));
    }
}
