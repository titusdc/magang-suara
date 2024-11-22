@extends('layout.auth')
@section('body')
<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[540px]" data-tab-for="order" data-page="active">
                <thead>
                    <tr>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Name</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Email</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Subject</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Massege</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                    <tr>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            {{ $contact->name }}
                        </td>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            {{ $contact->email }}
                        </td>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            {{ $contact->subject }}
                        </td>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            {{ $contact->massege }}
                        </td>
                        <td class="py-2 px-4 border-b border-b-gray-50">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('contact.destroy',$contact->id) }}" method="POST">
                                <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Contact belum Tersedia.
                    </div>
                @endforelse
            </tbody>
        </table>
        
        </div>
    </div>
@endsection