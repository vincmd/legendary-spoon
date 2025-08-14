@extends('template.body')
@section('main')
    @php
        session()->put('open_tab', 'home');
    @endphp


    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <x-newdata-button href="/admin/account" title="back" plus="false"></x-newdata-button>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Tambah akses / akun
            </h4>

            <form action="{{ route('add.account') }}" method="post">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Add account
                    </h2>
                    @csrf
                    <x-clasoc-input-component label="name" type="text" placeholder="john" name="name"
                        value="{{ old('name') }}"></x-clasoc-input-component>
                    <x-clasoc-input-component label="email" type="email" name="email" value="{{ old('email') }}"
                        placeholder="john@gmail.com"></x-clasoc-input-component>
                    <x-clasoc-input-component label="password" type="password" name="password" value="{{ old('password') }}"
                        placeholder="*******"></x-clasoc-input-component>
                    <br>
                    <x-form-button></x-form-button>
                </div>
            </form>
        </div>
    </main>
@endsection
