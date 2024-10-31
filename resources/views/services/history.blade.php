@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 justify-center mt-4 mb-8 overflow-x-hidden">
        <div class="flex flex-col gap-4 items-start px-4">
            <div>
                <h3 class="text-lg/tight font-medium text-gray-900">{{ auth()->user()->name }}</h3>

                <p class="mt-0.5 text-gray-700">
                    {{ auth()->user()->nim }}
                </p>
            </div>
            <div class="flex items-center justify-center">
                <h3 class="text-lg/tight font-medium text-gray-900">Riwayat Klaim</h3>
            </div>
            <div class="flex overflow-x-scroll space-x-4">
                @foreach ($claims as $claim)
                    <article class="w-fit flex-shrink-0 rounded-xl border-2 border-gray-100 bg-white">
                        <div class="flex items-start gap-4 p-4 sm:p-6 lg:p-8">
                            <a href="#" class="block shrink-0">
                                <img alt="{{ $claim->foundedItem->name }}"
                                    src="{{ asset('storage/' . $claim->foundedItem->photo) }}"
                                    class="size-14 rounded-lg object-cover" />
                            </a>

                            <div>
                                <h3 class="font-medium sm:text-lg">
                                    <a class="hover:underline">
                                        {{ $claim->foundedItem->name }}
                                    </a>
                                </h3>

                                <p class="line-clamp-2 text-sm text-gray-700">
                                    {{ Carbon\Carbon::parse($claim->created_at)->diffForHumans() }}
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <strong
                                class="-mb-[2px] -me-[2px] inline-flex items-center gap-1 rounded-ee-xl rounded-ss-xl bg-teal-600 px-3 py-1.5 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>

                                <span class="text-[10px] font-medium sm:text-xs">Verifikasi Berkas!</span>
                            </strong>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="flex items-center justify-center">
                <h3 class="text-lg/tight font-medium text-gray-900">Riwayat Penemuan Barang</h3>
            </div>
            <div class="flex overflow-x-scroll space-x-4">
                @foreach ($reports as $report)
                    <article class="w-fit flex-shrink-0 rounded-xl border-2 border-gray-100 bg-white">
                        <div class="flex items-start gap-4 p-4 sm:p-6 lg:p-8">
                            <a class="block shrink-0">
                                <img alt="{{ $report->name }}" src="{{ asset('storage/' . $report->photo) }}"
                                    class="size-14 rounded-lg object-cover" />
                            </a>

                            <div>
                                <h3 class="font-medium sm:text-lg">
                                    <a class="hover:underline">
                                        {{ $report->name }}
                                    </a>
                                </h3>

                                <p class="line-clamp-2 text-sm text-gray-700">
                                    Ditemukan di : {{ $report->location_option }}
                                </p>

                                <p class="line-clamp-2 text-sm text-gray-700">
                                    {{ Carbon\Carbon::parse($report->found_date)->diffForHumans() }}
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <strong
                                class="-mb-[2px] -me-[2px] inline-flex items-center gap-1 rounded-ee-xl rounded-ss-xl bg-teal-600 px-3 py-1.5 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>

                                <span class="text-[10px] font-medium sm:text-xs">Sedang di Klam!</span>
                            </strong>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
