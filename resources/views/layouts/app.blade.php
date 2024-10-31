<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOST FOUND FST</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon"
        href="https://fst.uinsgd.ac.id/wp-content/uploads/2020/05/cropped-logo-uin.png">
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="bg-teal-600 px-4 py-3 text-white">
        <p class="text-center text-sm font-medium">
            Best contributor this month?
            <a href="#" class="inline-block underline">Check this out!</a>
        </p>
    </div>
    <header class="bg-white">
        <div class="flex justify-between h-16 items-center gap-8 px-4 sm:px-6 lg:px-8">
            @if (route('home') != request()->url())
                <a class="block rounded-md bg-white px-5 py-2.5 text-sm font-medium text-teal-600 border border-1 border-teal-600 transition"
                    href="/">
                    Kembali
                </a>
            @else
                <img src="https://fst.uinsgd.ac.id/wp-content/uploads/2020/05/cropped-logo-uin.png" alt="Logo FST"
                    class="h-8" />
            @endif

            <div class="flex items-center justify-end md:justify-between">
                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        @if (auth()->user())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class="block rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700"
                                    type="submit">
                                    Keluar
                                </button>
                            </form>
                        @else
                            <a class="block rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700"
                                href="https://api.whatsapp.com/send?phone=6281386730890" target="_blank">
                                Hubungi Admin
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <p class="mt-4 text-center text-sm text-gray-500 lg:mt-0 lg:text-right">
                    Copyright &copy; 2024. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
