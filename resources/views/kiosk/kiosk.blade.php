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
<body class="min-h-screen w-full flex flex-col justify-center items-center bg-white">

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="bg-green-500 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- List layanan --}}
    <div class="bg-white flex justify-center items-start p-8">
        <div class="bg-gray-100 rounded-lg shadow-md p-6 text-white">
        @foreach ($kiosk as $service)
            <button value="{{ $service->id }}" onclick="openForm(this)"
                class="bg-purple-500 hover:bg-purple-700 px-4 py-2 rounded">
                {{ $service->services_name }}
            </button>
        @endforeach
    </div>
</div>
{{-- overflow --}}
    {{-- Popup form --}}
    <div id="overlay" class="hidden fixed inset-0 bg-black  flex justify-center items-center z-50">
    <section class="bg-white w-[350px] p-5 rounded-lg shadow-lg">
        <h2 class="text-lg font-bold mb-4">Masukkan Nomor Telepon</h2>
        <form onsubmit="submitForm(event)">
            <input type="text" name="phone_number" id="phone_number"
                class="border border-gray-300 rounded px-3 py-2 w-full mb-4"
                placeholder="08xxxxxxxxxx" required>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeForm()"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Kirim</button>
            </div>
            </form>
        </section>
        </div>


    <script>
        function openForm(button) {
            localStorage.setItem('selected_service', button.value);
            document.getElementById('overlay').classList.remove('hidden');
        }

        function closeForm() {

            document.getElementById('overlay').classList.add('hidden');
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
            document.getElementById('overlay').addEventListener('click', function(e) {
            if (e.target.id === 'overlay') {
            closeForm();
            }
            });

        }
    </script>
</body>

</html>
