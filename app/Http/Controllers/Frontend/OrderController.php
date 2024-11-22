<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'product_id'    => 'required',
            'name'          => 'required',
            'email'         => 'required',
            'number'        => 'required',
            'addres'        => 'required',
            'notes'         => 'required'
        ]);

        //upload image
        Order::create([
            'product_id'    => $request->product_id,
            'name'          => $request->name,
            'email'         => $request->email,
            'number'        => $request->number,
            'addres'        => $request->addres,
            'notes'         => $request->notes,
        ]);

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
