<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart($id)
    {
        $product = product::findOrFail($id);
     return view('cart.index', compact('product'));
    }

    public function removeFromCart(Request $request, $productid)
    {
        $cart = session()->get('cart');

        if (isset($cart[$productid])) 
        {
            // Hapus item dari keranjang
            unset($cart[$productid]);   
            session()->put('cart',$cart);
            return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
        }
    }

   public function addToCart(Request $request)
   {
    $productid  =   $request->input('product_id');
    $product    =   product::find($productid);
    if (!$product)
    {
        return redirect()->route('products.index')->with('error', 'Product not found!');
    }
    // Tambahkan produk ke keranjang 
    $cart    =   session()->get('cart',[]);
    $cart[$productid]    =   [
         'name'  =>  $product->name,
         'price' =>  $product->price,
    ];
    session()->put('cart',$cart);
    return redirect()->route('products.index')->with('success', 'Product added to cart successfully!');
   }
}
