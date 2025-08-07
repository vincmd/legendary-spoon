{{-- general Elements --}}
<h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Add new locket
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="{{ route('locket.store') }}" method="post">
        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Alias</span>
            <input name="alias"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="A" />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Email
            </span>
            <select name="email"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                @foreach ($sorted as $email)
                    <option value="{{ $email->$email }}">{{ $email->email }}</option>
                @endforeach
                <option value="" class="hidden" selected>opsi email</option>

            </select>
        </label>

        {{-- just for button , input useless --}}
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400 invisible" style="visibility:hidden">
                Button left
            </span>
            <div class="relative ">
                <input style="visibility:hidden"
                    class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    placeholder="Jane Doe" />
                <button
                type="submit"
                    class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    Add locket
                </button>
            </div>
        </label>


    </form>
</div>
