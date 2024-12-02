@extends('layout.frontend')
@section('body')
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Detail Category
        </h2>
      </div>
      <div class="row">
        @foreach ($products as $product)
        
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            
              <div class="img-box">
                <a href="{{ url('/detail-product',$product->id) }}">
                <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                </a>
              </div>
              <td class="text-center">{{ $product->category?->title }}</td>
              <div class="detail-box">
                
                <h6>
                  Price
                  <span>
                    <td class="text-center">{{ "Rp" . number_format($product->price,2,',','.') }}</td>
                  </span>
                </h6>
              </div>
              <a href="{{ url('/checkout') }}">
                <button type="button" class="text-black bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2">BUY</button>
              </a>
                <a href="{{ url('/cart',$product->id) }}">
                  <button type="button" class="text-black  bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2">CART</button>
                </a>
              
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>
                                                                
@endsection