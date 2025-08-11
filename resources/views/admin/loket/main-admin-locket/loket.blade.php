@extends('template.body')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            {{-- title --}}
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                <a href="/admin" class="hover:text-purple-500">Admin</a> / <a href="/admin/locket">Locket</a>
            </h2>
                {{-- tombol tambah data --}}
            <x-newdata-button title="New locket"></x-newdata-button>

            {{-- table --}}
           <x-table-comp
           :table_data=" $lockets "
           ></x-table-comp>

            {{-- @include('template.parts.chart.chart-parrent') --}}
        </div>
    </main>
@endsection
