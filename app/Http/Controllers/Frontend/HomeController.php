<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home()
    {
        $products = product::latest()->paginate(30);
     return view('frontend.home', compact('products'));
    }

    public function category($id)
    {
        $products = product::latest()->where('category_id', $id)->paginate(8);
     return view('frontend.category', compact('products'));
    }

    public function product(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('frontend.product', compact('product'));
    }

}
