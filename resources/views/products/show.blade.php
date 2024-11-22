@extends('layout.auth')
@section('body')
<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
    <div class="flex justify-between mb-4 items-start">
        
        <a href="{{ url('/products') }}" class="flex items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
    </svg>
    BACK
  </a>
    </div>
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                <thead>
                    <tr>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-left">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 30%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $product->title }}</h3>
                        <hr/>
                        <p>{{ "Rp " . number_format($product->price,2,',','.') }}</p>
                        <div>
                            <div>{!! $product->description !!}</div>
                        </div>
                        <hr/>
                        <p>Stock : {{ $product->stock }}</p>
                        <p>Category : {{ $product->category?->title }}</p>
                        <p>Type : {{ $product->type?->title }}</p>
                    </tr>
                </th>
            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection