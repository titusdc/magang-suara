@extends('layout.frontend')
@section('body')
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Detail Products
        </h2>
      </div>
      <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active"> 
                
                        <th class="text-left">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 30%">
                        <div class="product">
                            <p>Stock : {{ $product->stock }}</p>
                            <p>Category : {{ $product->category?->title }}</p>
                            <p>Type : {{ $product->type?->title }}</p>
                        </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $product->title }}</h3>
                        <hr/>
                        <p>{{ "Rp" . number_format($product->price,2,',','.') }}</p>
                        <a href="{{ url('/checkout',$product->id) }}">
                            <button type="button" class="text-black bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2">BUY</button>
                          </a>
                        <div class="product-description">
                            <div>{!! nl2br($product->description) !!}</div>
                        </div>
                        <hr/>
                        
                    </tr>
                </th>
            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  </section>
                                                                
@endsection