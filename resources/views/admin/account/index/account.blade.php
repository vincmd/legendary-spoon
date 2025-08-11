@extends('template.body')
@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            @include('template.header-link')

            <x-newdata-button title="New Account"></x-newdata-button>


            <x-table-comp :table_data="$users" :un_use_col="['password', 'email_verified_at', 'remember_token']" model_name="User">
            </x-table-comp>

        </div>
    </main>

    @include('template.close')
@endsection
