@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-start mt-8">
        <p class="mb-4 sm:text-xl/relaxed text-gray-600 text-center">
            {{ $searchedKeyword }}
            <br />
            <span>
                (Hilang sekitar : {{ \Carbon\Carbon::parse($searchedDate)->format('d M Y H:i') }})
            </span>
        </p>
        @if ($foundedItems->count() > 0)
            <h1 class="text-center text-2xl font-bold text-slate-900 mb-6">Mungkin ini barang milik kamu</h1>
        @else
            <h1 class="text-center text-2xl font-bold text-slate-900 mb-6">
                Wah, sepertinya barang kamu belum ditemukan seseorang😔
            </h1>
            <div class="flex flex-wrap justify-center gap-4 px-8">
                <p class="mt-2 sm:text-xl/relaxed">
                    Bisa jadi kamu salah masukin tanggal atau nama barang?
                </p>
                <a class="block w-full text-center rounded bg-teal-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-teal-700 focus:outline-none focus:ring active:bg-teal-500 sm:w-auto"
                    href="/search">
                    Coba cari lagi
                </a>

                <p class="mt-2 sm:text-xl/relaxed">
                    Atau
                </p>
                <a class="bg-white block text-center w-full rounded px-12 py-3 text-sm font-medium text-teal-600 shadow hover:text-teal-700 focus:outline-none focus:ring active:text-teal-500 sm:w-auto"
                    href="https://api.whatsapp.com/send?phone=6281386730890" target="_blank">
                    Hubungi admin
                </a>
            </div>
        @endif
        @foreach ($foundedItems->chunk(4) as $chunk)
            <div class="flex justify-center gap-6">
                @foreach ($chunk as $item)
                    <a class="group relative block overflow-hidden shadow-lg rounded-lg w-64">
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}"
                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" />

                        <div class="relative border border-gray-100 bg-white p-6">
                            <p class="text-gray-700">
                                <strong>Ditemukan pada :</strong>
                                {{ \Carbon\Carbon::parse($item->found_date)->format('d M Y H:i') }}
                            </p>

                            <h3 class="mt-1.5 text-lg font-medium text-gray-900">{{ $item->name }}</h3>

                            <form action="{{ route('claim_found', ['id' => $item->id]) }}" method="POST"
                                class="mt-4 flex gap-4">
                                @csrf
                                <button type="submit"
                                    class="block w-full rounded bg-teal-600 px-4 py-3 text-sm font-medium text-white transition hover:scale-105">
                                    Ya, ini milik saya
                                </button>
                            </form>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
