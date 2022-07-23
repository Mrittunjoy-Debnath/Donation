<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);

        // return $request->all();
        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $request->qty,
            'attributes' => [
                'image'=>$product->product_image,
            ]
        ]);

        return redirect('/cart/show');

    }

    public function showCart()
    {
        $cartProducts = Cart::getContent();
        // return $cartProducts;

        return view('front-end.cart.showcart',[
            'cartProducts'=>$cartProducts,
        ]);
    }

    public function deleteCart($id)
    {
        Cart::remove($id);

        return redirect('/cart/show');
    }

    public function updateCart(Request $request)
    {
        Cart::update($request->rowId, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
          ));
        return redirect('/cart/show');

    }

    public function clearCart()
    {
        $id = Session::get('customerId');
        Cart::clear();
        Cart::session( $id)->clear();

        Session::put('orderTotal',50);
        return redirect()->back();
    }
}
