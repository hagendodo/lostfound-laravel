@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 items-center justify-left mt-4">
        <h1 class="text-center text-xl font-bold text-slate-900">FST LOST FOUND</h1>
        <img class="w-32 h-32" src="https://fst.uinsgd.ac.id/wp-content/uploads/2020/05/cropped-logo-uin.png"
            alt="LOGO UIN SGD" />
        @error('error')
            <div class="text-teal-500 text-sm">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm p-6">
            @csrf
            <div class="mb-4 text-center">
                <h3 class="text-lg font-bold">Login {{ Auth::check() }}</h3>
                <span class="text-sm text-gray-600">(Gunakan akun SALAM untuk login.)</span>
            </div>
            <div class="mb-4">
                <label for="nim" class="block text-gray-700 text-sm font-bold mb-2">NIM</label>
                <input id="nim" type="number" name="nim"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('nim') border-teal-500 @enderror"
                    value="{{ old('nim') }}" requiteal autofocus>
                @error('nim')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" type="password" name="password"
                    class="w-full px-3 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring focus:ring-teal-500 focus:border-teal-500 @error('password') border-teal-500 @enderror"
                    requiteal>
                @error('password')
                    <span class="text-teal-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full px-4 py-2 bg-teal-500 text-white font-bold rounded hover:bg-teal-700 focus:outline-none focus:ring focus:ring-teal-500">
                    Login
                </button>
            </div>
        </form>
    </div>
@endsection
