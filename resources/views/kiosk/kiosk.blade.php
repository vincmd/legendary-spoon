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
        <div class="bg-gray-100 rounded-lg shadow-md p-6">
       <!-- Tombol List Services -->
    @foreach ($kiosk as $item)
    <button onclick="openPopup('{{ $item->id }}', '{{ $item->services_name }}')"
    class="bg-purple-500 hover:bg-purple-300 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
    {{ $item->services_name }}
    </button>
    @endforeach</div>
    </div>

    <!-- Popup -->
    <div id="popup-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative animate-fadeIn">
        <!-- Tombol Close -->
        <button onclick="closePopup()" class="absolute top-3 right-3 text-black hover:text-red-500 transition duration-200">
            ✖
        </button>
        <h2 id="popup-title" class="text-xl font-semibold text-gray-800 mb-5"></h2>
        <input type="hidden" id="services_id">
        <input type="text" id="vehicle_number"
            class="border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full p-3 rounded-lg mb-5 outline-none transition"
            placeholder="Masukkan Nomor Plat anda">
        <div class="flex justify-between gap-4 mt-4">
    <button onclick="closePopup()"
    class="flex-1 bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-lg shadow-md transition duration-200">
    Batal
    </button>
    <button onclick="submitForm()"
    class="flex-1 bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg transition duration-200">
    Kirim
        </button>
    </div>

        </button>
        </div>
    </div>

    <script>
        function openPopup(id, label) {
            let pesan, placeholderText;
            let normalizedLabel = label.trim().toLowerCase();

    if (normalizedLabel === "ganti plat") {
        pesan = "Tolong Masukkan Nomor Plat Anda";
        placeholderText = "Masukkan Nomor plat";
    } else if (normalizedLabel === "perpanjang stnk") {
        pesan = "Tolong Masukkan Nomor STNK Anda";
        placeholderText = "Masukkan Nomor STNK";
    } else if (normalizedLabel === "registrasi kendaraan baru") {
        pesan = "Silahkan Masukkan Data Kendaraan Baru Anda";
        placeholderText = "Masukkan Data kendaraan";
    } else {
        pesan = "Tolong masukkan " + normalizedLabel;
        placeholderText = "Masukkan " + normalizedLabel;
    }

    document.getElementById("popup-title").innerText = pesan;
    document.getElementById("vehicle_number").placeholder = placeholderText;
    document.getElementById("services_id").value = id;

    document.getElementById("popup-overlay").classList.remove("hidden");
    document.getElementById("popup-overlay").classList.add("flex");

    document.getElementById("vehicle_number").focus();
    }

    function closePopup() {
        document.getElementById("popup-overlay").classList.add("hidden");
        document.getElementById("popup-overlay").classList.remove("flex");
    }

    function submitForm() {
    let services_id = document.getElementById("services_id").value;
    let vehicle_number = document.getElementById("vehicle_number").value;

    fetch("/kiosk/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            services_id: services_id,
            vehicle_number: vehicle_number,
            locket_id: null, // bisa diisi ID lockets jika ada
            level_id: null   // bisa diisi ID level jika ada
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            alert("Error: " + data.error);
        } else {
            alert(data.success || "Data berhasil dikirim");
            closePopup();
            document.getElementById("vehicle_number").value = "";
        }
    })
    .catch(err => {
        console.error(err);
        alert("Gagal mengirim data");
    });
    }

    // Tutup popup kalau klik luar
    document.getElementById("popup-overlay").addEventListener("click", function(e) {
        if (e.target === this) {
            closePopup();
        }
    });
    </script>

</body>
