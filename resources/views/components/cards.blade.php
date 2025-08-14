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

            {{-- under construction ======================================================= --}}
            @if ($item['status'])
                @php
                    $que_code = $item['data'];
                    $char_code = str_split($que_code);
                    $audio_data = [];

                    // Static intro words
                    $library_awal = [
                        'start' => asset('aset/audio/start.mp3'),
                        'nomor' => asset('aset/audio/nomor.mp3'),
                        'antrian' => asset('aset/audio/antrian.mp3'),
                        'silahkan' => asset('aset/audio/silahkan.mp3'),
                        'menuju' => asset('aset/audio/menuju.mp3'),
                        'loket' => asset('aset/audio/loket.mp3'),
                    ];

                    $library = $library_awal;

                    // Letters A–Z
                    foreach (range('A', 'Z') as $letter) {
                        $library[strtolower($letter)] = asset("aset/audio/huruf/{$letter}.mp3");
                    }

                    // Numbers 0–9
                    foreach (range(0, 9) as $num) {
                        $library[(string) $num] = asset("aset/audio/angka/{$num}.mp3");
                    }

                    // Build sequence from que_code
                    foreach ($char_code as $char) {
                        $char = strtolower($char);
                        if (isset($library[$char])) {
                            $audio_data[] = $library[$char];
                        }
                    }

                    // Merge intro + code
                    $full_audio_sequence = array_merge(array_values($library_awal), $audio_data);
                @endphp

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let files = @json($full_audio_sequence);
                        let index = 0;

                        function playNext() {
                            if (index < files.length) {
                                let audio = new Audio(files[index]);
                                index++;
                                audio.addEventListener("ended", playNext);
                                audio.play();
                            }
                        }

                        playNext();
                    });
                </script>
            @endif
            {{-- ============================================================== --}}
        </div>
        <!-- Card -->
    @endforeach
</div>
