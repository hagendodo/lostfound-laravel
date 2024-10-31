@extends('layouts.app')

@section('content')
    <section class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Barang yang hilang berhasil dilaporkan.
                    <strong class="font-extrabold text-teal-700 sm:block"> Terima kasih orang baik 🙏🏻 </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Silahkan menyerahkan barang ke admin Fakultas Sains dan Teknologi
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a class="block w-full rounded bg-teal-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-teal-700 focus:outline-none focus:ring active:bg-teal-500 sm:w-auto"
                        href="https://api.whatsapp.com/send?phone=6281386730890" target="_blank">
                        Hubungi Admin
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
