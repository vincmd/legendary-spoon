@props([
    'title'=>'add',
])
  {{-- just for button , input useless --}}
  <label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400 invisible" style="visibility:hidden">
        Button left
    </span>
    <div class="relative ">
        <input style="visibility:hidden"
            class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
            placeholder="Jane Doe" />
        <button type="submit"
            class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            {{ $title }}
        </button>
    </div>
</label>