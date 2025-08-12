@extends('template.body')
@section('main')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Modals
        </h2>
        <main class="h-full pb-16 overflow-y-auto">
            {{-- video display --}}
            @include('admin.video.base-video', [$video])
            {{-- button to open pop-up model --}}
            @include('admin.video.edit-video')

        </main>
    </div>
    {{-- pop up model --}}
    @include('admin.video.popup-video', [$video])
@endsection
