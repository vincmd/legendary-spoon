<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes minim {
            0% {
                transform: translateX(0);
                opacity: 100%;
            }

            95% {
                opacity: 100%;
                transform: translateX(-900px);
            }

            90% {
                transform: translateX(-100px);
            }

            100% {
                opacity: 0%;
                transform: translateX(-100px);
            }
        }

        @keyframes maxim {
            0% {
                transform: translateX(-60px);
                opacity: 0;
            }

            3% {
                transform: translateX(-60px);
                opacity: 100%;
            }

            100% {
                transform: translateX(0px);
            }

        }

        .minim {
            animation: minim 1s ease-in-out;
            transform: translateX(-100px);
            z-index: -1;
        }

        .maxim {
            animation: maxim 1s ease-in-out;
            z-index: -1;

        }

        .custom-select {
            appearance: none;
            /* removes native styling */
            -webkit-appearance: none;
            -moz-appearance: none;
            /* your custom icon */
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
            padding-right: 2em;
            /* give space for the icon */
        }
    </style>
</head>

<body class="h-[99.8vh] w-full flex flex-col justify-center items-center colorback">

    <header class="w-full h-12 colormain sticky top-0 left-0 flex flex-row justify-between items-center px-10">
        <img src="{{ asset('aset/logo-bapenda-kaltim.png') }}" alt="" class="w-48 h-full">
        <button class="bgcolorside w-36 h-10" id="profile-button">{{ session('email') }}</button>
        <div class="bgcolorside w-48 h-48 fixed top-12 right-1 hidden flex-col items-center justify-around rounded-b-2xl"
            id="profile">
            <img src="" alt="" class="fixed w-36 h-36 rounded-full colorback top-0">
            <div class="flex flex-col mt-20 items-center">
                <h2>{{ session('username') }}</h2>
                <h3>{{ session('email') }}</h3>
            </div>
            <a href="/logout" class="colorback w-36 h-8 text-black font-bold text-center ">logout</a>

        </div>
    </header>

    <main class="h-full w-full flex flex-row">

        <section class="ml-10 w-full h-9/10 flex flex-col items-center">
            {{-- isi di sini --}}
            <div class="h-24 w-full flex flex-col items-center justify-center">
                <h1 class="text-2xl font-bold font-sans capitalize">pelayanan</h1>
            </div>
            <div class="w-5/9 p-4 h-2/3 bg-white rounded">
                <h2 class="text-xl font-sans font-semibold mb-4">Pilih layanana loket</h2>
                <h2 class="text-lg font-medium font-sans">layanan loket</h2>
                <form action="{{ route('select.lockets') }}" method="post"
                    class="  w-full flex flex-col justify-between h-8/10 p-2">
                    @csrf

                    <select name="opsi" id=""
                        class=" border-1 border-black h-8 pl-2 font-medium  font-serif capitalize block appearance-none  rounded leading-tight focus:outline-none custom-select"
                        style="background-image: url('{{ asset('aset/down.png') }}');">


                        @foreach ($servicess as $serve)
                            <option class="pl-2 font-medium font-mono " value="{{ $serve->id }}">
                                {{ $serve->id . ':' . $serve->services_name }}</option>
                        @endforeach
                        <option class="pl-2 font-medium font-mono hidden capitalize" selected>--pilih loket--</option>
                    </select>

                    <button type="submit"
                        class="bg-green-400 w-18 h-8 rounded-lg text-lg font-medium font-sans">simpan</button>
                </form>
            </div>

            {{--  --}}
        </section>
    </main>

    <footer class="sticky bottom-0 left-0 w-full h-4 bg-main"></footer>


    {{-- background color --}}
    <script>
        const colorside = "bg-[#CDCCCC]";
        const colormain = "bg-[#FFBC4C]";
        const colorback = "bg-stone-100";

        // Use Tailwind-compatible dynamic classes
        const bgcolorside = `bg-[${colorside}]`;
        `bg-[${colormain}]`; // optional if you want to use color as text or bg

        // Apply to all elements with class 'bgcolorside'
        document.querySelectorAll('.bgcolorside').forEach(el => {
            el.classList.add(colorside);
        });

        document.querySelectorAll('.colormain').forEach(el => {
            el.classList.add(colormain);
        });

        document.querySelectorAll('.colorback').forEach(el => {
            el.classList.add(colorback);
        });
    </script>
    {{-- profile --}}
    <script>
        const toggleButton = document.getElementById("profile-button");
        const popupPanel = document.getElementById("profile");

        // Toggle visibility on button click
        toggleButton.addEventListener("click", (e) => {
            e.stopPropagation(); // prevent document click from immediately closing it
            popupPanel.classList.toggle("hidden");
            popupPanel.classList.add("flex");
            toggleButton.classList.add("hidden");
        });

        // Close the panel if clicking outside it
        document.addEventListener("click", (e) => {
            if (!popupPanel.contains(e.target) && !toggleButton.contains(e.target)) {
                popupPanel.classList.add("hidden");
                popupPanel.classList.toggle("flex");
                toggleButton.classList.remove("hidden");
            }
        });

        // Optional: Prevent inner clicks from bubbling to document
        popupPanel.addEventListener("click", (e) => {
            e.stopPropagation();
        });
    </script>


</body>

</html>
