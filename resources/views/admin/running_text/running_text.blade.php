@php
    session()->put('open_tab','running text');
@endphp
@include('template.body')
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Modals
    </h2>
    <main class="h-full pb-16 overflow-y-auto">
        {{-- text display --}}
        @include('admin.running_text.base-running-text' ,[$running_text])
        {{-- button to open pop-up model --}}
        @include('admin.running_text.edit-button-runnign-text')

    </main>
</div>
{{-- pop up model --}}
@include('admin.running_text.popup-modal-running-text',[$running_text])
{{-- close pop-up --}}


{{-- html tag close --}}
@include('template.close')


