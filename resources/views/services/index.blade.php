@extends('layouts.app')

@section('content')
    <!-- Plugins: - @tailwindcss/forms -->
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">

        <form method="POST" action="{{ route('search_found') }}"
            class="w-full max-w-sm bg-white p-6 rounded-lg shadow-md mx-auto mt-8">
            @csrf
            <h3 class="text-lg font-bold text-center mb-4">Cari Barang Hilang</h3>

            <!-- Input for DateTime -->
            <div class="mb-4">
                <label for="found_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal dan Waktu
                    Kehilangan</label>
                <input id="found_date" type="datetime-local" name="found_date"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('found_date') border-teal-500 @enderror"
                    value="{{ old('found_date') }}" required>
                @error('found_date')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input for Text (Item Description) -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                <input id="name" type="text" name="name"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('name') border-teal-500 @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full px-4 py-2 bg-teal-500 text-white font-bold rounded hover:bg-teal-700 focus:outline-none focus:ring focus:ring-teal-500">
                    Cari
                </button>
            </div>
        </form>
    </div>
@endsection
