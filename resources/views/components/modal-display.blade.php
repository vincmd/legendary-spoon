@props([
    'data'=>'',
    'tag'=>'p',
])


<div class="w-9/10 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <{{ $tag }} class="mb-4 text-gray-600 dark:text-gray-400">
        {{ $data }}
    </{{ $tag }}>


</div>
