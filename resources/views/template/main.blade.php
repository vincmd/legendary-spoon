@include('template.body')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        {{-- title --}}
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        {{-- @include('template.parts.cta') --}}

        {{-- @include('template.parts.card') --}}

        {{-- @include('template.parts.table.table') --}}

        {{-- @include('template.parts.chart.chart-parrent') --}}
    </div>
</main>

@include('template.close')
