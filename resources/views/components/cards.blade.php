@props([
    'datas' => [['title' => '', 'data' => '', 'status' => false]],
    'cols' => '1',
])

@php
    $countes = count(array_filter($datas, fn($item) => $item['status'] === true));
    $backup_count = $countes;
    $row_count = count($datas);

    // Loket number (can be dynamic later)
    $delay = 5500;
    $loketNumber = '1';
    $sdelay = $delay + 3000;

    // Common audio library
    $library = [
        'start' => asset('aset/audio/start.mp3'),
        'nomor' => asset('aset/audio/nomor.mp3'),
        'antrian' => asset('aset/audio/antrian.mp3'),
        'silahkan' => asset('aset/audio/silahkan.mp3'),
        'menuju' => asset('aset/audio/menuju.mp3'),
        'loket' => asset('aset/audio/loket.mp3'),
        'loket_no' => asset("aset/audio/angka/{$loketNumber}.mp3"),
    ];

    foreach (range('A', 'Z') as $letter) {
        $library[strtolower($letter)] = asset("aset/audio/huruf/{$letter}.mp3");
    }

    foreach (range(0, 9) as $num) {
        $library[(string) $num] = asset("aset/audio/angka/{$num}.mp3");
    }

@endphp

<script>
    localStorage.setItem('refresh', @json($countes));
    // Ensure refresh_count exists
    // if (!localStorage.getItem('refresh_count')) {
    localStorage.setItem('refresh_count', @json($countes));
    // }
</script>

<div class="grid gap-6 mt-5 md:grid-cols-{{ $cols }} xl:grid-cols-w" style="width:50%; height: 100%;">
    @foreach ($datas as $item)
        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-xs bg-white dark:bg-gray-800" style="max-height: 150px">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ $item['title'] }}</p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $item['data'] }}</p>
            </div>
        </div>

        @if (!empty($item['status']) && $item['status'])
            @php
                $queueCode = strtolower($item['data']);
                $audioSequence = array_merge(
                    [$library['start'], $library['nomor'], $library['antrian']],
                    array_map(fn($char) => $library[$char] ?? null, str_split($queueCode)),
                    [$library['silahkan'], $library['menuju'], $library['loket'], $library['loket_no']],
                );
                $audioSequence = array_filter($audioSequence);

                // $delayold = $delayval;
                $delay *= 1.64;

            @endphp

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const files = @json($audioSequence);
                    let index = 0;

                    function playNext() {
                        if (index < files.length) {
                            const audio = new Audio(files[index]);
                            index++;
                            audio.addEventListener("ended", playNext);
                            audio.play();
                        }
                    }

                    const bcou = @json($backup_count);
                    const cou = @json($countes);

                    if (bcou === cou) {
                        playNext();
                        setTimeout(() => {
                            localStorage.setItem('refresh_count', parseInt(localStorage.getItem('refresh_count')) -
                                1);
                        }, @json($delay));
                    } else if (@json($countes) >= 0) {
                        setTimeout(playNext, @json($delay));
                        setTimeout(() => {
                            localStorage.setItem('refresh_count', parseInt(localStorage.getItem('refresh_count')) -
                                1);
                        }, @json($delay));
                    }
                });
            </script>
        @endif

        @php $countes -= 1; @endphp

        @if ($loop->iteration >= $row_count)
            <script>
                const refreshDelay = localStorage.getItem('refresh') === '0' ? 8000 : @json($delay) +
                    @json($sdelay);

                setTimeout(() => {
                    location.reload();
                }, refreshDelay);
            </script>
        @endif
    @endforeach
</div>
