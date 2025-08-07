@php
    session()->put('open_tab', 'account');
@endphp
@include('template.body')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        {{-- title --}}
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <a href="/admin" class="hover:text-purple-500">Admin</a> / <a href="/admin/locket">Account</a>
        </h2>

        @include('admin.account.index.cta-account-admin')


        @include('admin.account.index.table-account')

    </div>
</main>

@include('template.close')
