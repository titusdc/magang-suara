<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart($id)
    {
        $product = product::findOrFail($id);
     return view('frontend.cart', compact('product'));
    }

    public function removeFromCart($id)
    {
        $carts = Cart::findOrFail($id);

        //delete product
        $carts->delete();

        return redirect()->route('listcart')->with('success', 'Product added to cart successfully!');
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
    Cart::create([
        'product_id'         => $request->product_id,
        'jumlah'             => $request->jumlah,
    ]);
    return redirect()->route('listcart')->with('success', 'Product added to cart successfully!');
   }

   public function listCart()
   {
    $carts = Cart::latest()->get();
    
    return view('frontend.listcart',compact('carts'));
   }
   
}