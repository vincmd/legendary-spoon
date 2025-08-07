@php
    session()->put('open_tab','running text');
@endphp
@include('template.body')
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Modals
    </h2>
    <main class="h-full pb-16 overflow-y-auto">
        @include('admin.running_text.base-running-text' ,[$running_text])
        @include('admin.running_text.edit-button-runnign-text')

    </main>
</div>
@include('admin.running_text.popup-modal-running-text',[$running_text])
@include('template.close')


