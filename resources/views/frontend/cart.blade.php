@extends('layout.frontend')
@section('body')


    <div class="cart">
        <div class="cart-item">
            <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 30%">
        </div>
<form action="{{ url('/cart/add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
      <input type="product" placeholder="Product" name='product_id' value="{{ $product->id }}" />
    </div>
    <div>
      <input type="jumlah" placeholder="Jumlah" name='jumlah' />
    </div>
    <div class="d-flex ">
        <button type="submit">
          submit
        </button>
    </div>
</form>
@endsection