@extends('layouts.app')

@section('content')
    <section class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 pt-20 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Yeayy 🎉🎉 barang kamu sedang dalam verifikasi kepemilikian oleh admin.
                    <strong class="font-extrabold text-teal-700 sm:block"> Mohon untuk menunggu yaa 🙏🏻 </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Kamu akan dihubungi oleh admin fakultas apabila barang kamu sudah selesai diverifikasi.
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded bg-teal-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-teal-700 focus:outline-none focus:ring active:bg-teal-500 sm:w-auto"
                        href="riwayat">
                        Lihat proses verifikasi
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
