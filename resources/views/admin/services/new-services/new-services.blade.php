@php
    session()->put('open_tab', 'services');
@endphp
@include('template.body')


    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Forms
            </h2>

            @include('admin.services.new-services.new-services-form')


        </div>
    </main>
    @include('template.close')

{{--
<form enctype="multipart/form-data" action="{{ Route('services.create') }}" method="POST"    class="w-2/3 flex flex-col items-start gap-8 h-full ">
    @csrf

    <div class="w-9/10 flex flex-col">
        <label for="services_name">services name</label>
        <input type="text" name="services_name" placeholder=""
        autofocus
            class="border border-black rounded-lg bg-white pl-5 w-full">
    </div>
    <div class="w-9/10 flex flex-col">
        <label for="code">code/alias</label>
        <input type="text" name="code" placeholder=""
        autofocus
            class="border border-black rounded-lg bg-white pl-5 w-full">
    </div>
    <div class="w-9/10 flex flex-col">
        <label for="logo">logo</label>
        <input type="file" name="logo" placeholder="logo" class="bg-slate-200 border border-slate-400 w-2/4 rounded-xl">
    </div>
    <div class="w-8/10 flex items-center justify-end flex-col h-12  ">
        <button type="submit" class=" bg-green-500 w-24 h-8 rounded-lg">tambah</button>
    </div> --}}
