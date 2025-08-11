@php
    $current_url = url()->current();
    $now_url = parse_url($current_url);
    $exploded_url = explode('/', $now_url['path']);
    $b = '';
@endphp
{{-- title --}}
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    @foreach ($exploded_url as $a)
        @if ($a == null)
        @else
            @php
                $b = $b . '/' . $a;
                $a=str_replace(['-','_'],' ',$a)
            @endphp
            / <a href="{{ $b }}" class="hover:text-purple-500">{{ $a }}</a>
        @endif
    @endforeach

</h2>
