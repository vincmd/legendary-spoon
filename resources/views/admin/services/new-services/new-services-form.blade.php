{{-- general Elements --}}
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Elements
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Jane Doe" />
    </label>

    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Jane Doe" />
    </label>

    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            Button right
        </span>
        <div class="relative text-gray-500 focus-within:text-purple-600">
            <input
                class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe"
                type="file" />
            <button
                class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple hidden"
                id="cacel_logo">

                Click
            </button>
        </div>
    </label>


    @if (session('temporary_path'))
    <script>
        document.getElementById('cancel_logo').classList.remove('hidden')
    </script>

    @endif

</div>
