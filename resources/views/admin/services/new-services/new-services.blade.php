@php
    session()->put('open_tab', 'services');
@endphp
@include('template.body')


    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                <a href="/admin">Admin</a> / <a href="/admin/services">services</a> / <a href="/admin/services/new">new</a>
            </h2>

            @include('admin.services.new-services.new-services-form')


        </div>
    </main>
    @include('template.close')
