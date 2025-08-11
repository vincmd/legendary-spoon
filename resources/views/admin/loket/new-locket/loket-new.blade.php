@extends('template.body')
@section('main')

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            @include('template.header-link')
        </h2>

        @include('admin.loket.new-locket.form-general-locket')


    </div>
</main>
@endsection
