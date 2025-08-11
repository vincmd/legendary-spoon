@props([
    'desc_tag'=>'textarea',
    'title'=>'modals title',
    'desc'=>'modal description',
])

<!-- Modal body -->
<div class="mt-4 mb-6">
    <!-- Modal title -->
    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
        {{ $title }}
    </p>
    <!-- Modal description -->
    <label class="block text-sm">
        <{{ $desc_tag }} name="text" type="text"
            class=" mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input w-full h-full  text-start flex flex-col items-left justify-start max-w-full break-words p-0"
            placeholder="plat" >{{ $desc }}</{{ $desc_tag }}>
    </label>
</div>

