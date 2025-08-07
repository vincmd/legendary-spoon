@include('template.body')
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Modals
    </h2>
    <main class="h-full pb-16 overflow-y-auto">
        @include('template.modal.base-text')
        @include('template.modal.modal-open-button')

    </main>
</div>
@include('template.modal.modal')
@include('template.close')
