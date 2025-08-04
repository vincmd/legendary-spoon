<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login </title>
    @vite('resources/css/app.css')
</head>

<body class="h-[99.8vh] w-full flex flex-row justify-between items-center overflow-hidden bg-stone-100">
    <form action="{{ Route('checking') }}" method="post"
        class="bg-[#ffffff] p-1 border-3 border-[#636363] w-1/5 max-sm:w-8/9 max-lg:w-7/9 h-1/2 rounded-lg lg:ml-40 max-lg:m-auto ">
        @csrf
        <main
            class="bg-[#FFAC26] w-full h-full rounded-lg flex flex-col justify-between ">
            <div class="max-w-9/10 max-h-1/4 lg:hidden">
                <img src="{{ asset('aset/logo-bapenda-kaltim.png') }}" alt="">
            </div>
            <div>
                <div class="flex flex-col  p-2 justify-center items-center">
                    <label for="" class="text-white">EMAIL</label>
                    <input type="text" name="email" required autofocus placeholder=" MASUKKAN EMAIL"
                        class="text-md font-mono font-semibold border border-black rounded-lg bg-white w-60 h-10 text-center">
                </div>
                <div class="flex flex-col p-2 justify-center items-center">
                    <label for="password" class="text-white">PASSWORD</label>
                    <input type="password" name="password" placeholder=" MASUKKAN PASSWORD" required autocomplete="off"
                        class="text-md font-mono font-semibold border border-black rounded-lg bg-white w-60 h-10 text-center">
                </div>
            </div>
            <div class="justify-center text-center text-xl text-blue-800">
                @if (session('error'))
                {{ session('error') }}
                @endif
            </div>
            <div class="w-full flex flex-col justify-center items-center mb-1">
                <button type="submit"
                    class="border border-black bg-white hover:bg-lime-500 cursor-pointer rounded-2xl px-4 py-1 w-60 h-10 ">Login</button>
            </div>
        </main>

    </form>

    <div
        class="bg-[#F3B60E] w-4/8 h-[120%] rounded-l-full flex flex-col items-end justify-center fixed z-[-1] right-0 max-lg:w-9/10">
        <div class="bg-[#DA7B37] w-11/14 h-full rounded-l-full flex flex-col items-end justify-center">
                <img src="{{ asset('aset/logo-bapenda-kaltim.png') }}" alt=""
                    class=" bg-amber-50 max-w-110 mr-20 px-2 max-lg:hidden">
        </div>
    </div>
</body>

</html>
