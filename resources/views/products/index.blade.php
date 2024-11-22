@extends('layout.auth')
@section('body')
<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
    <div class="flex justify-between mb-4 items-start">
        <div class="font-medium">Product</div>
        <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">ADD Product</a>
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
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-center">Stock</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-center rounded-tl-md rounded-bl-md">Action</th>
                    </tr>
                </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                                </td>
                                <td class="text-center">{{ $product->title }}</td>
                                <td class="text-center">{{ $product->category?->title }}</td>
                                <td class="text-center">{{ $product->type?->title }}
                                </td>
                                <td class="text-center">{{ "Rp " . number_format($product->price,2,',','.') }}</td>
                                <td class="text-center">{{ $product->stock }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Products belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection