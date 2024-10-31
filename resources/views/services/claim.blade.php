@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 items-center justify-center mt-4 mb-8">
        <form method="POST" action="{{ route('verification_claim') }}" enctype="multipart/form-data"
            class="w-full max-w-sm p-6">
            @csrf
            <div class="text-center">
                <h3 class="text-lg font-bold mb-4">Lampirkan Bukti Kepemilikan Barang</h3>
                <span class="text-sm text-gray-600">Dapat berupa screenshot pembelian, nota pembelian barang, surat
                    kepemilikan, dll.</span>
            </div>
            <!-- Input for Name (Item Name) -->
            <div class="mb-4">
                <input id="name" type="number" name="founded_item" hidden="hidden"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('name') border-teal-500 @enderror"
                    value="{{ $foundedItemId }}" required>
                @error('founded_item')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input for Photo (Image Upload) -->
            <div class="mb-4">
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Bukti Kepemilikan Barang (Foto atau
                    Dokumen)</label>
                <input id="photo" type="file" name="validation_photo_items"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('photo') border-teal-500 @enderror"
                    required>
                @error('photo')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full px-4 py-2 bg-teal-500 text-white font-bold rounded hover:bg-teal-700 focus:outline-none focus:ring focus:ring-teal-500">
                    Klaim Barang
                </button>
            </div>
        </form>
    </div>
@endsection
