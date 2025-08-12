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
                    <video muted id="myVideo" playsinline src="{{ $video }}">

                    </video>
                </div>
            </div>
            <script>
                const video = document.getElementById('myVideo');
                window.addEventListener('DOMContentLoaded', () => {


                    // Muted videos can autoplay, so we can try to play it immediately after metadata is loaded.
                    video.muted = true; // Ensure the muted attribute is set

                    // Wait for the video's metadata to load before doing anything
                    video.addEventListener('loadedmetadata', () => {
                        // Restore playback time on load
                        const savedTime = localStorage.getItem('videoTime');
                        console.log(savedTime);
                        if (savedTime) {
                            video.currentTime = parseFloat(savedTime);
                            console.log(video.currentTime);

                            setTimeout(() => {
                                if (video.currentTime == savedTime) {
                                    video.currentTime = parseFloat(0);
                                    video.play();
                                }
                            }, 2000);
                        }


                        video.play().then(() => {
                            // console.log('Video autoplayed successfully because it is muted.');
                        }).catch(error => {
                            console.error('Autoplay failed:', error);
                            // Even though it's muted, a different error might occur.
                            // You can add a fallback here if needed.
                        });
                    });

                    // Save playback time before the page unloads
                    window.addEventListener('beforeunload', () => {
                        localStorage.setItem('videoTime', video.currentTime);
                    });
                });




                setInterval(() => {
                    location.reload();
                    // console.log( video.currentTime);

                }, 8000);
            </script>
    </main>
@endsection
