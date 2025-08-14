@extends('template.body')
@section('main')
    @php

    @endphp


    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            @include('template.header-link')
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Forms
            </h2>

            {{-- @include('template.form.general-input.form-general-input') --}}
            {{-- @include('template.form.icon-input.form-icon') --}}
            {{-- @include('template.form.button-wtih-input.form-button-input') --}}
            {{-- @include('template.form.validate-input.validate-form') --}}


        </div>
    </main>
@endsection
