@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col gap-4 items-center justify-center mt-4 w-fit">
    <h1 class="text-center text-xl font-bold text-slate-900">FST LOST FOUND</h1>
    <img class="w-48 h-48" src="https://fst.uinsgd.ac.id/wp-content/uploads/2020/05/cropped-logo-uin.png" alt="LOGO UIN SGD" />

    <form method="POST" action="{{ route('search_found') }}" class="w-full max-w-sm bg-white p-6 rounded-lg shadow-md">
        @csrf
        <h3 class="text-lg font-bold text-center mb-4">Cari Barang Hilang</h3>

        <!-- Input for DateTime -->
        <div class="mb-4">
            <label for="found_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal dan Waktu Kehilangan</label>
            <input id="found_date" type="datetime-local" name="found_date" class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 @error('found_date') border-red-500 @enderror" value="{{ old('found_date') }}" required>
            @error('found_date')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Input for Text (Item Description) -->
        <div class="mb-4">
            <label for="item_description" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
            <input id="item_description" type="text" name="item_description" class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 @error('item_description') border-red-500 @enderror" value="{{ old('item_description') }}" required>
            @error('item_description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Select Option (Category)
        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Lokasi</label>
            <select id="category" name="category" class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror" required>
                <option value="" disabled selected>Select a category</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="accessories">Accessories</option>
                <option value="documents">Documents</option>
            </select>
            @error('category')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div> -->

        <div class="flex items-center justify-between">
            <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500">
                Cari
            </button>
        </div>
    </form>
</div>

@endsection