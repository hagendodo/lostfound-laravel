@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center mt-4 mb-28">
    <h1 class="text-center text-2xl font-bold text-slate-900 mb-6">Founded Items</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($foundedItems as $item)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md">
            <img class="w-full h-48 object-cover rounded-t-lg" src="{{ $item->photo }}" alt="Item Image">
            <div class="p-5">
                <h5 class="mb-2 text-xl font-bold text-gray-900">{{ $item->name }}</h5>
                <p class="mb-3 text-gray-700">
                    <strong>Found Date:</strong> {{ \Carbon\Carbon::parse($item->found_date)->format('d M Y H:i') }}
                </p>
                <div class="text-center">
                    <a href="" class="w-full inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Klaim Barang Saya
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection