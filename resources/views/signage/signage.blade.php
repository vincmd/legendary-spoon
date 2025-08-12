@php
    session('open_tab', 'running text');
@endphp
{{-- @include('template.body') --}}
@extends('template.second-body')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            {{-- title --}}
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                signage
            </h2>
            <div class="flex flex-row w-full justify-center items-center gap-6">
                <x-cards :datas="$que"></x-cards>

                <div class=" bg-white dark:bg-gray-800  rounded " style=" width: 20px; height: 100%;"></div>

                <div class=" bg-white dark:bg-gray-800  rounded flex flex-row justify-center items-center"
                    style="width: 45% ; height: 100%;">
                    <video autoplay muted id="myVideo" controls playsinline>
                        <source src="http://127.0.0.1:8000/storage/sementara/tifjGUBcyqJUsckUHPQKJbC37B7QHWXkFWqi0MWT.mp4"
                            type="video/mp4">
                    </video>
                </div>
            </div>
            <script>
                const video = document.getElementById('myVideo');
console.log('seekable ranges:', video.seekable);
console.log('seekable length:', video.seekable.length);

                document.addEventListener('DOMContentLoaded', () => {
                    const video = document.getElementById('myVideo');

                    video.addEventListener('loadedmetadata', () => {
                        const savedTime = localStorage.getItem('videoTime');
                        if (savedTime !== null) {
                            video.currentTime = parseFloat(savedTime);
                        }
                        video.play().catch(e => {
                            console.log('Play prevented:', e);
                        });
                    });

                    window.addEventListener('beforeunload', () => {
                        if (!video.paused) {
                            localStorage.setItem('videoTime', video.currentTime);
                        }
                    });
                });



                // setInterval(() => {
                //     location.reload();
                // }, 8000);
            </script>
    </main>
@endsection
