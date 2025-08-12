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
       <!-- Tombol List Services -->
@foreach ($kiosk as $item)
<button onclick="openPopup('{{ $item->id }}', '{{ $item->services_name }}')"
    class="bg-purple-500 hover:bg-purple-300 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
    {{ $item->services_name }}
</button>
@endforeach

<!-- Popup -->
<div id="popup-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 relative animate-fadeIn">
        <!-- Tombol Close -->
        <button onclick="closePopup()" class="absolute top-3 right-3 text-gray-400 hover:text-red-500 transition duration-200">
            ✖
        </button>
        <h2 id="popup-title" class="text-xl font-semibold text-gray-800 mb-5"></h2>
        <input type="hidden" id="services_id">
        <input type="text" id="phone_number"
            class="border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 w-full p-3 rounded-lg mb-5 outline-none transition"
            placeholder="Masukkan nomor HP">
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
    document.getElementById("popup-title").innerText = "Tolong masukkan " + label;
    document.getElementById("services_id").value = id;
    document.getElementById("popup-overlay").classList.remove("hidden");
    document.getElementById("popup-overlay").classList.add("flex");
}

function closePopup() {
    document.getElementById("popup-overlay").classList.add("hidden");
    document.getElementById("popup-overlay").classList.remove("flex");
}

function submitForm() {
    let services_id = document.getElementById("services_id").value;
    let phone_number = document.getElementById("phone_number").value;

    fetch("/kiosk", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            services_id: services_id,
            phone_number: phone_number
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.success || "Data berhasil dikirim");
        closePopup();
        document.getElementById("phone_number").value = "";
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

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
    animation: fadeIn 0.2s ease-in-out;
}
</style>
