@extends('template.body')
@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="mt-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            </h2>

            {{-- general Elements --}}
            <x-newdata-button href="/admin/account" title="back" plus="false"></x-newdata-button>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Tambah layanan
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('locket.store') }}" method="post">
                    @csrf
                    <x-clasoc-input-component name="alias" label="alias" placeholder="A"></x-clasoc-input-component>


                    <x-clasoc-input-component type=" " tag="select" name="emails" label="email">
                        @foreach ($sorted as $email)
                            <option value="{{ $email->email }}">{{ $email->email }}</option>
                        @endforeach
                        <option value="" class="hidden" selected>opsi email</option>

                    </x-clasoc-input-component>


                    {{-- just for button , input useless --}}
                    <x-form-button title="add locket"></x-form-button>


                </form>
            </div>



        </div>
    </main>
@endsection
