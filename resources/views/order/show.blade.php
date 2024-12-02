@extends('layout.auth')
@section('body')
<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
    <div class="flex justify-between mb-4 items-start">
        
        <a href="{{ url('/order') }}" class="flex items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
            </svg>
            BACK
          </a>
    </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                <thead>
                    <tr>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md"></th>
                    </tr>
                </thead>
<tbody>
    <tr>
        <th>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                     
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <p> Name        :  {{ $orders->name }} </p>
                        <p> Email       :  {{ $orders->email }}</p>
                        <p> Number      :  {{ $orders->number }}</p>
                        <p> Addres      :  {{ $orders->addres }}</p>
                        <p> Notes       :  {{ $orders->notes }}</p>
                    </div>
                </th>
    </tr>
</tbody>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                    <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-center rounded-tl-md rounded-bl-md">Image</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-center">Title</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-center rounded-tl-md rounded-bl-md">Category</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-center">Type</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-center rounded-tl-md rounded-bl-md">Price</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-center">Jumlah</th>
                            
                        </tr>
                    </thead>
                        <tbody>
                            @forelse ($orders->items as $item)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/products/'.$item->product?->image) }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td class="text-center">{{ $item->product?->title }}</td>
                                    <td class="text-center">{{ $item->product?->category?->title }}</td>
                                    <td class="text-center">{{ $item->product?->type?->title }}
                                    </td>
                                    <td class="text-center">{{ "Rp " . number_format($item->product?->price,2,',','.') }}</td>
                                    <td class="text-center">{{ $item->jumlah }}</td>
                                    
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Products belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection