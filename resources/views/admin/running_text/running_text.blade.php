@extends('template.body')

@section('main')
    <div class="container grid px-6 mx-auto">
        {{-- title --}}
        @include('template.header-link')
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

        </h2>
        <main class="h-full pb-16 overflow-y-auto">
            {{-- text display --}}
            <x-modal-display data="{{ $running_text }}" tag="p"></x-base-modal>


            {{-- button to open pop-up model --}}
            <div>
                <button @click="openModal"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Edit text
                </button>
            </div>


        </main>
    </div>
    {{-- pop up model --}}
    @include('admin.running_text.popup-modal-running-text', [$running_text])
@endsection
