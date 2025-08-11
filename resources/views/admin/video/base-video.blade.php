<div class="w-9/10  px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 ">
    @if ($video)
        @if ($video->file_path !== null)
            <video src="{{ asset('storage/' . $video->file_path) }}" style="max-width: 60%" controls>

            </video>
        @endif
    @endif


</div>
