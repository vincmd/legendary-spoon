@extends('template.body')
@section('main')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        {{-- title --}}
            @include('template.header-link')

        @include('admin.services.index.cta-services')

        {{-- @include('template.parts.card') --}}

       <x-table-comp :table_data="$servi"></x-table-comp>

        {{-- @include('template.parts.chart.chart-parrent') --}}
    </div>
</main>

@endsection

