@extends('layout.auth')
@section('body')
<div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
    <div class="flex justify-between mb-4 items-start">
        
        <a href="{{ url('/categorys') }}" class="flex items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                            TITLE
                        </th>
                    </tr>
                </thead>
            </table>
<tbody>
    <tr>
        <th class="text-left">
                    <div class="card-body">
                        <form action="{{ route('categorys.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                                <!-- error message untuk image -->

                            <div class="form-group mb-3">
                                
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Product">
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                        </form> 
                    </div>
        </th>
    </tr>
</tbody>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection