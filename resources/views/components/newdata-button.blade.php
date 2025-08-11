@props([
    'title' => 'new',
    'href' => '',
    'plus' => "true",
])

@php
    $current_url = url()->current();
    if ($href === '') {
        $href = "$current_url/new";
    }
@endphp

<!-- CTA -->
<a class="flex  items-center  justify-between  text-sm font-semibold" href="{{ $href }}">
    <div class="flex items-center">

    </div>
    <span
        class="p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">{{ $title }}
        @if ($plus=="true")
            &#43;
        @endif
    </span>
</a>
