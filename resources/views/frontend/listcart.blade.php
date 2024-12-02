@extends('layout.frontend')
@section('body')
<table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
    <thead>
        <tr>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Image</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Product</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Jumlah</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Action</th>
        </tr>
    </thead>
<tbody> 
    @forelse ($carts as $cart)
    <tr>
    <td class="text-center">
        <img src="{{ asset('/storage/products/'.$cart->product?->image) }}" class="rounded" style="width: 150px">
    </td>
    <td class="text-center">{{ $cart->product?->title }}</td>
    <td class="text-center">{{ $cart->jumlah }}</td>
    <td>
    <a href="{{ url('/cart/remove',$cart->id) }}"><button type="button" class="text-black bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2">Hapus</button></a>
    </td>
    </tr>
    @empty
    
@endforelse
</tbody>
</table>
<a href="{{ url('/checkout') }}">
    <button type="button" class="text-black bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2">Checkout</button>
  </a>
@endsection