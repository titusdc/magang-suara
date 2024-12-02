<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'number'        => 'required',
            'addres'        => 'required',
            'notes'         => 'required'
        ]);
        //upload image
        $order = new Order;
 
        $order->name    =  $request->name;
        $order->email   =  $request->email;
        $order->number  =   $request->number;
        $order->addres  =   $request->addres;
        $order->notes   =   $request->notes;
        $order->save();
        
        $carts = Cart::query()->get();
        foreach ($carts as $cart)
        {
            OrderItem::create([
                'order_id'  => $order->id,
                'product_id'=> $cart->product_id,
                'jumlah'    => $cart->jumlah,
            ]);
        }
        

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function index()
    {
        $orders = Order::latest()->paginate(10);

        return view("order.index", compact('orders'));
    }

    public function show(string $id)
    {
        $orders = Order::findOrFail($id);

        return view('order.show', compact('orders'));
    }

    public function destroy($id)
    {
        $orders = Order::findOrFail($id);

        $orders->delete();

        return redirect()->route('order.index')->with(['succes' => 'berhasil di hapus!']);
    }
}
