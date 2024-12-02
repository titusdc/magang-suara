@extends('layout.frontend')
@section('body')
    <div class="container">
       <h1>Keranjang Belanja</h1>
      
        <div class="cart">
            <div class="cart-item">
                <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 30%">
                <div class="item-details">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ "Rp" . number_format($product->price,2,',','.') }}</p>
                    
                </div>
            </div>
            <div class="cart-item">
                <img src="image/p3.png" alt="Produk 2">
                <div class="item-details">
                    <h2>Nama Produk 2</h2>
                    <p>Harga: Rp150.000</p>
                    <button>Hapus</button>
                </div>
            </div>

            <div class="total">
                <h3>{{ "Rp " . number_format($product->price,2,',','.') }}</h3>
                <a href="{{ url('/checkout',$product->id) }}">
                    <button class="checkout">Checkout</button>
                </a>
                
                <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">Hapus</button>
                </form>
                
            </div>
        </div>
    </div>
    
@endsection