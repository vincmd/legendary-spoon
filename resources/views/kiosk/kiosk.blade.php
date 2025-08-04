<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>kiosk</title>
    @vite('resources/css/app.css')
</head>

<body class="h-[99.8vh] w-full flex flex-col justify-center items-center z-0">

    @if (session('succes'))
        {{ session('succes') }}
    @endif


    @foreach ($kiosk as $layanans)
        <button value="{{ $layanans->id }}" name="opsi" onclick="bukaa(this)"
            class="bg-blue-400 w-14 h-12 active:bg-amber-500">
            {{ $layanans->services_name }}
        </button>
    @endforeach


    <section class="hidden bg-stone-300 border border-black w-[400px] h-[300px] fixed top-0 lef-8 p-2" id="main-form">
    <form onsubmit="continou_data(event)">
        <div class="flex flex-col justify-start items-start w-8/9 h-1/4">
            <label for="">nomor telpn</label>
            <input type="text" name="phone_number" id="phone_number" class="bg-white" id="nomor_telp">

        </div>

        <div class="flex flex-row w-36 absolute right-0 bottom-0 ">

            <button class=" bg-green-500" type="submit"> next</button>
            <button type="reset" onclick="document.getElementById('main-form').classList.add('hidden');"
                class="bg-red-200">cancel</button>
        </div>

    </form>
    </section>


    <script>
        function bukaa(selectElement) {
            const layanan = selectElement.value;
            localStorage.setItem('layanan', layanan);
            // console.log(localStorage.getItem('layanan'));
            document.getElementById('main-form').classList.remove('hidden');

        }

        function continou_data(event) {
            event.preventDefault();
            const nomor_telp = document.getElementById('phone_number').value;
            const layanans = localStorage.getItem('layanan');
            if (nomor_telp.length > 7) {
                console.log('hiyak');
                fetch(`/kiosk/add`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            services_id: layanans,
                            phone_number: nomor_telp,
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.success);
                    })
                    .catch(err => {
                        console.error('Error:', err);
                    });

            }
            localStorage.removeItem('layanan');
            document.getElementById('main-form').classList.add('hidden');
        }
    </script>
</body>

</html>
