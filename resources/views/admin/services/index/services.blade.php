@php
    session()->put('open_tab', 'services');
@endphp
@include('template.body')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        {{-- title --}}
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <a href="/admin" class="hover:text-purple-500">Admin</a> / <a href="/admin/locket">Locket</a>
        </h2>

        @include('admin.services.index.cta-services')

        {{-- @include('template.parts.card') --}}

        @include('admin.services.index.services-table')

        {{-- @include('template.parts.chart.chart-parrent') --}}
    </div>
</main>

@include('template.close')

@foreach ($servi as $services)
    <tr>
        <td class="border border-black font-mono font-semibold text-center">
            {{ $loop->iteration }}</td>

        <td class="border border-black font-mono font-semibold pl-1">
            {{ $services->services_name }}</td>
        <td class="border border-black font-mono font-semibold pl-1">{{ $services->code }}</td>
        <td class="border border-black font-mono font-semibold pl-1"><img src=""
                alt="logo"></td>
        <td class="border border-black font-mono font-semibold pl-1">
            <form method="POST" action="{{ route('services.destroy', $services->id) }}"
                onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button>
                    hapus
                </button>
            </form>
        </td>
    </tr>
@endforeach