<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Layanan Loket</title>
    @vite('resources/css/app.css')

</head>

<body class="min-h-screen w-full flex flex-col bg-gray-900 text-white">

    {{-- Header --}}
<header class="w-full h-14 bg-gray-800 flex justify-end items-center px-6 shadow">
    <button id="profile-button"
        class="bg-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-600 transition">
        {{ session('email') }}
        </button>
    </header>

    {{-- Profil Dropdown --}}
    <div id="profile"
        class="bg-gray-800 w-56 h-56 fixed top-14 right-4 hidden flex-col items-center justify-around rounded-b-2xl shadow-lg z-50">
        <img src="" alt="" class="w-24 h-24 rounded-full bg-gray-700 mt-4">
        <div class="flex flex-col items-center">
            <h2 class="font-semibold">{{ session('username') }}</h2>
            <h3 class="text-gray-400 text-sm">{{ session('email') }}</h3>
        </div>
        <a href="/logout"
            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition duration-200">
            Logout
        </a>
    </div>

    {{-- Main Content --}}
    <main class="flex-grow flex flex-col items-center justify-center px-4">
        <div class="bg-gray-800 rounded-lg shadow-md p-6 w-full max-w-lg">
            <h1 class="text-2xl font-bold text-white mb-4 text-center">Pilih Layanan Loket</h1>
            <form action="{{ route('select.lockets') }}" method="POST" class="space-y-4">
                @csrf
                <select name="opsi" required
                    class="border border-gray-600 bg-gray-900 text-white focus:border-purple-500 focus:ring focus:ring-purple-200 w-full p-3 rounded-lg outline-none transition">
                    <option value="" selected hidden>-- Pilih Loket --</option>
                    @foreach ($servicess as $serve)
                        <option value="{{ $serve->id }}" class="bg-gray-900 text-white">
                            {{ $serve->id . ' : ' . $serve->services_name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit"
                    class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-3 rounded-lg shadow-md transition duration-200 w-full">
                    Simpan
                </button>
            </form>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="w-full h-8 bg-gray-800"></footer>

    {{-- Script toggle profile --}}
    <script>
        const toggleButton = document.getElementById("profile-button");
        const popupPanel = document.getElementById("profile");


        toggleButton.addEventListener("click", (e) => {
            e.stopPropagation();
            popupPanel.classList.toggle("hidden");
         });


        document.addEventListener("click", (e) => {
            if (!popupPanel.contains(e.target) && !toggleButton.contains(e.target)) {
                popupPanel.classList.add("hidden");
             }
        });
        </script>

    </body>

</html>      
