<div class="w-9/10  px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 ">
    @if ($video)
        @if ($video->file_path !== null)
        <video style="max-width: 60%" controls playsinline src="{{ $video->file_path }}" class="rounded ">

        </video>
        @endif
    @endif


</div>
