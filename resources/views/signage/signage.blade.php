@php
    session('open_tab', 'running text');
@endphp
{{-- @include('template.body') --}}
@extends('template.second-body')

@section('main')
    <main class="h-full overflow-y-auto" style="width: 98%">

        <div class="container px-6 mx-auto flex flex-col w-full h-full ">
            {{-- title --}}
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                signage
            </h2>
            <div class="flex flex-row w-full justify-center items-start gap-6 " style="height:80%">
                <x-cards :datas="$que"></x-cards>

                <div class=" bg-white dark:bg-gray-800  rounded " style=" width: 20px; height: 100%;"></div>

                <div class=" bg-white dark:bg-gray-800  rounded flex flex-col justify-between items-center p-3"
                    style="width: 100% ; height: 100%;">
                    <div class="height:90%;width:100%;">
                        <video muted id="myVideo" playsinline src="{{ $video }}" class="rounded ">

                        </video>
                    </div>
                    <div id="marquee"
                        style="white-space: nowrap;overflow: hidden;width: 100%;height:8%; " class="bg-gray-300">
                        <span id="marquee-text" style=" text-transform: capitalize ;display: inline-block;will-change: transform; font-weight: bolder;" class="text-2xl dark:text-white text-gray-600 ">
                            {{ $text }}
                        </span>
                    </div>


                </div>
            </div>
            {{-- autoplay video also auto load  --}}
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
            </script>

            {{-- running text also auto load --}}
            <script>
                let marquee = document.getElementById('marquee-text');
                let parentWidth = marquee.parentElement.offsetWidth;
                let position = parseFloat(localStorage.getItem('marqueePos')) || parentWidth; // start or resume

                function scrollText() {
                    position -= 1; // speed: smaller = slower
                    marquee.style.transform = `translateX(${position}px)`;

                    if (position < -marquee.offsetWidth) {
                        position = parentWidth; // reset after text fully passes
                    }

                    localStorage.setItem('marqueePos', position); // save position
                    requestAnimationFrame(scrollText);
                }

                scrollText();
            </script>
            {{-- page refresh --}}
            <script>
                setInterval(() => {
                    // location.reload();
                    // console.log( video.currentTime);

                }, 8000);
            </script>

    </main>
@endsection
