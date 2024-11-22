<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout($id)
    {
        $product = product::findOrFail($id);
     return view('checkout.index', compact('product'));
    }
}
