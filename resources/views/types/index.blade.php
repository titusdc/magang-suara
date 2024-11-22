@extends('layout.auth')
@section('body')
<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
    <div class="flex justify-between mb-4 items-start">
        <div class="font-medium">Type</div>
        <a href="{{ route('types.create') }}" class="btn btn-md btn-success mb-3">ADD Type</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
            <thead>
                <tr>
                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Title</th>
                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                <tr>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        {{ $type->title }}
                    </td>
                    <td class="py-2 px-4 border-b border-b-gray-50">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('types.destroy', $type->id) }}" method="POST">
                            <a href="{{ route('types.show', $type->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('types.edit', $type->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Type belum Tersedia.
                    </div>
                @endforelse
            </tbody>
        </table>
        {{ $types->links() }}
    </div>
</div>
@endsection