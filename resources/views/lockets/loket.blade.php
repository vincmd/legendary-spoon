<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loket </title>
    @vite('resources/css/app.css')
</head>

<body class="h-[99.8vh] w-full flex flex-col justify-center items-center">

    <form action="{{ route('flush.locket.services') }}" method="post">
        @csrf
        @method('delete')
        <button>log out</button>
    </form>
</body>

</html>
