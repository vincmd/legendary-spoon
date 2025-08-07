{{-- general Elements --}}
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Elements
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <form enctype="multipart/form-data" action="{{ route('services.create') }}" method="post">
        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nama</span>
            <input name="services_name"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="plat" />
        </label>


        <label class="block text-sm mt-2">
            <span class="text-gray-700 dark:text-gray-400">code</span>
            <input name="code"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="A" />
        </label>



        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Logo
            </span>
            <div class="relative text-gray-500 focus-within:text-purple-600">
                <input {{-- value="{{ session('temporary_path') }}" --}}
                name="logo"
                    class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                    onchange="upload_temp_logo(this)" placeholder="Jane Doe" type="file" />
                <button
                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple hidden"
                    id="cancel_logo" onclick="cancel_logo_upload()">

                    Cancel logo
                </button>
            </div>
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
                <button type="submit"
                    class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    Add Services
                </button>
            </div>
        </label>

    </form>

</div>
{{-- logo temporary and cancel --}}
<script>
    let fileInputElement = null; // Save original input for cancel

    function upload_temp_logo(element) {
        const file = element.files[0];
        if (!file) return;

        fileInputElement = element; // Save for cancel use

        const formData = new FormData();
        formData.append('file', file);

        fetch('/upload-temp-logo', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                const img = document.createElement('img');
                img.src = data.url;
                img.id = 'upload-preview';
                img.classList.add(
                    'w-12', 'mt-2', 'rounded',
                    'border', 'border-gray-400',
                    'dark:border-gray-600'
                );

                var parent = element.parentElement;
                element.classList.add('hidden'); // or use element.remove() if you don't want to bring it back
                parent.appendChild(img);


                document.getElementById('cancel_logo').classList.remove('hidden');
            })
            .catch(err => {
                console.error('Upload failed:', err);
            });
    }

    function cancel_logo_upload() {
        if (!fileInputElement) return;

        const newInput = fileInputElement.cloneNode();
        newInput.value = ""; // Reset file
        newInput.onchange = () => upload_temp_logo(newInput);

        const img = document.getElementById('upload-preview');
        img.replaceWith(newInput);

        document.getElementById('cancel_logo').classList.add('hidden');
    }
</script>
