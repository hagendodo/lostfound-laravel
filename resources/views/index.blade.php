@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col gap-4 items-center justify-center">
    <h1 class="text-center text-xl font-bold">LOST FOUND FST</h1>
    <img class="w-48 h-48" src="https://fst.uinsgd.ac.id/wp-content/uploads/2020/05/cropped-logo-uin.png" alt="LOGO UIN SGD" />
    <div class="inline-flex flex-col rounded-md shadow-sm w-10/12" role="group">
        <a href="/search" class="w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
            Cari barang hilang
        </a>
        <a href="/search" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
            Laporkan penemuan barang
        </a>
        <a href="/search" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-b-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
            Hubungi admin
        </a>
    </div>
</div>

@endsection