@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col gap-4 items-center justify-center mt-4 w-fit">
        <h1 class="text-center text-xl font-bold text-slate-900">FST LOST FOUND</h1>
        <img class="w-48 h-48" src="https://fst.uinsgd.ac.id/wp-content/uploads/2020/05/cropped-logo-uin.png"
            alt="LOGO UIN SGD" />

        <form method="POST" action="{{ route('register') }}" class="w-full max-w-sm bg-white p-6 rounded-lg shadow-md">
            @csrf
            <h3 class="text-lg font-bold text-center mb-4">Register</h3>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input id="name" type="text" name="name"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 @error('nim') border-teal-500 @enderror"
                    value="{{ old('nim') }}" required autofocus>
                @error('name')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nim" class="block text-gray-700 text-sm font-bold mb-2">NIM</label>
                <input id="nim" type="number" name="nim"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 @error('nim') border-teal-500 @enderror"
                    value="{{ old('nim') }}" required autofocus>
                @error('nim')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" type="password" name="password"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 @error('password') border-teal-500 @enderror"
                    required>
                @error('password')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500">
                    Register
                </button>
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
            </div>
        </form>
    </div>
@endsection
