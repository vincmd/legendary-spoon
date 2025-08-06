<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loket</title>
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
            z-index: 0;
        }

        .maxim {
            animation: maxim 1s ease-in-out;
            z-index: 0;

        }
    </style>
</head>

<body class="h-[99.8vh] w-full flex flex-col justify-center items-center colorback">

    <header class="w-full h-12 colormain sticky top-0 left-0 flex flex-row justify-between items-center px-10">
        <img src="{{ asset('aset/logo-bapenda-kaltim.png') }}" alt="" class="w-48 h-full">
        <button class="bgcolorside w-36 h-10" id="profile-button">{{ session('email') }}</button>
        <div class="bgcolorside w-48 h-48 fixed top-12 right-1 hidden flex-col items-center justify-around rounded-b-2xl z-20"
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
        <nav class=" h-full w-1/6 flex flex-row justify-arround colorback" id="navigator">
            <div class="flex bgcolorside flex-col justify-start items-center h-full z-10">
                <div class="w-20 h-1/2 sticky flex flex-col justify-evenly items-center z-10 pl-2">
                    <button class=" h-5 w-5 max-sm:hidden " onclick="hideoropen()" >
                        <img src="{{ asset('aset/menu.png') }}"alt="">
                    </button>
                    <img src="{{ asset('aset/home.png') }}" alt="" class="bg-green w-5 h-5 z-20"
                        onclick="window.location.href='/admin';">
                    <img src="{{ asset('aset/user.png') }}" alt="" class="bg-green w-5 h-5 z-20"
                        onclick="window.location.href='/admin/account';">
                    <img src="{{ asset('aset/partnership.png') }}" alt="" class="bg-green w-5 h-5 z-20"
                        onclick="window.location.href='/admin/layanan';">
                    <img src="{{ asset('aset/costumer-service.png') }}  " alt="" class="bg-green w-5 h-5 z-20"
                        onclick="window.location.href='/admin/locket';">
                    <img src="{{ asset('aset/left-align.png') }}" alt="" class="bg-green w-5 h-5 z-20">
                </div>
            </div>

            <div class="flex flex-col items-start  bgcolorside pr-4 max-sm:hidden" id="navtestr">
                <div class=" h-1/2 sticky flex flex-col justify-evenly items-start">
                    <h3 class="text-center font-medium font-mono text-xl  text-[#CDCCCC]  "> -</h3>
                    <a href="/admin" class="text-center font-medium font-mono text-xl ">home</a>
                    <a href="/admin/account" class="text-center font-medium font-mono text-xl ">account</a>
                    <a href="/admin/services" class="text-center font-medium font-mono text-xl ">services</a>
                    <a href="/admin/locket" class="text-center font-medium font-mono text-xl ">lockets</a>
                    <a href="/admin/running_text" class="text-center font-medium font-mono text-xl ">running text</a>
                </div>
            </div>
        </nav>
        <section class="ml-10 w-full flex flex-col items-center">
            {{-- isi di sini --}}

            <div class=" h-20 flex flex-row justify-around items-center w-full">
                <h1></h1>
                <h1 class="font-bold text-2xl font-sans">Tambah Loket</h1>
                <button class="bg-[#CF822A] rounded-md w-36 h-8"
                    onclick="window.location.href='/admin/locket';">back</button>
            </div>
            <div class="bg-white w-48/54 h-15/20 flex flex-col gap-10 items-center  pb-30  ">
                <h1 class="h-24 w-9/10 flex justify-center items-center font-bold text-lg font-serif mr-32">
                    Tambah locket baru
                </h1>
                <form action="{{ Route('locket.create') }}" method="POST"
                    class="w-2/3 flex flex-col items-start gap-8 h-full ">
                    @csrf
                    <div class="w-9/10 flex flex-col">
                        <label for="alias">alias</label>
                        <input type="text" name="alias" placeholder="alias"
                        autofocus
                            class="border border-black rounded-lg bg-white pl-5 w-full">
                    </div>
                    <div class="w-9/10 flex flex-col">
                        <label for="email">email</label>
                        <select name="email" id=""
                            class="w-full border border-black rounded-lg bg-white pl-5">
                            <option value=" ">pilih email</option>
                            @foreach ($sorted as $email)
                                <option value="{{ $email->email }}">{{ $email->email }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="w-8/10 flex items-center justify-end flex-col h-12  ">
                        <button type="submit" class=" bg-green-500 w-24 h-8 rounded-lg">tambah</button>
                    </div>
                </form>

            </div>

            {{--  --}}
        </section>
    </main>

    <footer class="sticky bottom-0 left-0 w-full h-4 bg-main"></footer>

    {{-- side bar --}}
    <script>
        function hideoropen() {
            const navigators = document.getElementById('navtestr');
            const clas = navigators.classList;


            if (clas.contains('minim')) {
                clas.remove('minim');
                clas.remove('hidden');
                clas.add('maxim');
                document.getElementById('navigator').classList.add('w-1/6');
                document.getElementById('navigator').classList.remove('w-12');

            } else if (clas.contains('maxim')) {
                clas.remove('maxim');
                setTimeout(() => {
                    clas.add('hidden');
                    document.getElementById('navigator').classList.remove('w-1/6');
                    document.getElementById('navigator').classList.add('w-12');
                }, 990);
                clas.add('minim');
            } else {
                clas.add('minim');
                setTimeout(() => {
                    clas.add('hidden');
                    document.getElementById('navigator').classList.remove('w-1/6');
                    document.getElementById('navigator').classList.add('w-12');
                }, 990);

            }
        }
    </script>
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
