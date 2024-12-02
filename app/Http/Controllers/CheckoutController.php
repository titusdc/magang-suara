<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        
     return view('checkout.index');
    }
}
