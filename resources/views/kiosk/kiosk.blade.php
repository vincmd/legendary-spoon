<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kiosk Services</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen w-full flex flex-col justify-center items-center bg-white text-white">

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="bg-green-500 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- List layanan --}}
    <div class="bg-white flex justify-center items-start p-8">
        <div class="bg-gray-100 rounded-lg shadow-md p-6">
        @foreach ($kiosk as $service)
            <button value="{{ $service->id }}" onclick="openForm(this)"
                class="bg-purple-500 hover:bg-purple-700 px-4 py-2 rounded">
                {{ $service->services_name }}
            </button>
        @endforeach
    </div>
</div>

    {{-- Popup form --}}
    <section id="main-form"
        class="hidden bg-gray-800 border border-gray-600 w-[400px] p-4 rounded fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 shadow-lg">
        <form onsubmit="submitForm(event)">
            <h2 class="text-lg font-bold mb-4">Masukkan Nomor Telepon</h2>
            <input type="text" name="phone_number" id="phone_number"
                class="bg-gray-200 text-black px-2 py-1 w-full mb-4" placeholder="08xxxxxxxxxx">

            <div class="flex justify-end gap-2">
                <button type="reset" onclick="closeForm()" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Batal</button>
                <button type="submit" class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded">Kirim</button>
            </div>
        </form>
    </section>

    <script>
        function openForm(button) {
            localStorage.setItem('selected_service', button.value);
            document.getElementById('main-form').classList.remove('hidden');
        }

        function closeForm() {
            document.getElementById('main-form').classList.add('hidden');
            localStorage.removeItem('selected_service');
        }

        function submitForm(event) {
            event.preventDefault();
            const nomor_telp = document.getElementById('phone_number').value;
            const serviceId = localStorage.getItem('selected_service');

            if (nomor_telp.length > 7) {
                fetch(`/kiosk/add`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            services_id: serviceId,
                            phone_number: nomor_telp
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.success || 'Data berhasil dikirim');
                        closeForm();
                    })
                    .catch(err => {
                        console.error('Error:', err);
                    });
            } else {
                alert('Nomor telepon minimal 8 digit.');
            }
        }
    </script>
</body>

</html>
