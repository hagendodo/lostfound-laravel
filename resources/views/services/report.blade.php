@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 items-center justify-center mt-4 mb-8">
        <form method="POST" action="{{ route('report_found') }}" enctype="multipart/form-data" class="w-full max-w-sm p-6">
            @csrf
            <h3 class="text-lg font-bold text-center mb-4">Laporkan Penemuan Barang Hilang</h3>

            <!-- Input for Found DateTime -->
            <div class="mb-4">
                <label for="found_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal dan Waktu Barang
                    Ditemukan</label>
                <input id="found_date" type="datetime-local" name="found_date"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('found_date') border-teal-500 @enderror"
                    value="{{ old('found_date') }}" required>
                @error('found_date')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input for Name (Item Name) -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                <input id="name" type="text" name="name"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('name') border-teal-500 @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input for Location Option -->
            <div class="mb-4">
                <label for="location_option" class="block text-gray-700 text-sm font-bold mb-2">Lokasi ditemukan</label>
                <input id="location_option" type="text" name="location_option"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('location_option') border-teal-500 @enderror"
                    value="{{ old('location_option') }}" required>
                @error('location_option')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input for Photo (Image Upload) -->
            <div class="mb-4">
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Foto Barang</label>
                <input id="photo" type="file" name="photo" accept="image/*"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('photo') border-teal-500 @enderror"
                    required>
                @error('photo')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full px-4 py-2 bg-teal-500 text-white font-bold rounded hover:bg-teal-700 focus:outline-none focus:ring focus:ring-teal-500">
                    Laporkan
                </button>
            </div>
        </form>
        <div class="mb-4"></div>
    </div>
@endsection
