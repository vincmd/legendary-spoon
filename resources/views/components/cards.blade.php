@props([
    'datas' => [['title' => '', 'data' => '']],
    'cols' => '1',
])
@php

@endphp
<div class="grid gap-6 mt-5 md:grid-cols-{{ $cols }} xl:grid-cols-w " style="width:50%; height: 100%;">
    @foreach ($datas as $item)
        @if ($loop->iteration == 1)
            @continue
        @endif
        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-xs  bg-white dark:bg-gray-800 " style="max-height: 150px">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z">
                    </path>
                    <path
                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    {{ $item['title'] }}
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $item['data'] }}
                </p>
            </div>
        </div>
        <!-- Card -->
    @endforeach
</div>
