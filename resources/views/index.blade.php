@extends('layouts.app')

@section('content')
    <section class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 pb-10 pt-24 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Barang saya hilang nih.
                    <strong class="font-extrabold text-teal-700 sm:block"> Harus gimana? </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Cari aja disini, siapa tau udah ada yang nemuin barang kamu.
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded bg-teal-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-teal-700 focus:outline-none focus:ring active:bg-teal-500 sm:w-auto"
                        href="/search">
                        Cari Barang Saya
                    </a>

                    <a class="bg-white block w-full rounded px-12 py-3 text-sm font-medium text-teal-600 shadow hover:text-teal-700 focus:outline-none focus:ring active:text-teal-500 sm:w-auto"
                        href="/report">
                        Laporkan Penemuan Barang
                    </a>

                    @if (auth()->user())
                        <a class="bg-white block w-full rounded px-12 py-3 text-sm font-medium text-teal-600 shadow hover:text-teal-700 focus:outline-none focus:ring active:text-teal-500 sm:w-auto"
                            href="/riwayat">
                            Riwayat
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
