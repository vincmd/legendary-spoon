@php
    session()->put('open_tab', 'locket');
@endphp
@include('template.body')


    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              <a href="/admin">Admin</a> / <a href="/admin/locket">Locket</a> / <a href="/admin/locket/new">new</a>
            </h2>

            @include('admin.loket.new-locket.form-general-locket')
            {{-- @include('template.form.icon-input.form-icon') --}}
            {{-- @include('template.form.button-wtih-input.form-button-input') --}}
            {{-- @include('template.form.validate-input.validate-form') --}}

        </div>
    </main>
    @include('template.close',['sorted'=>$sorted])


