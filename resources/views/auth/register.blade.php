@extends('layouts.app')

@section('content')
    <div class="min-h-[1000px] flex flex-col justify-center items-center py-12">
        <div class="w-full max-w-4xl sm:px-6 lg:px-8">
            <h2 class="tracking-tight text-3xl font-bold text-gray-800 text-center">
                {{ __("auth.register") }}
            </h2>
            <div class="my-8 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <x-auth.register.register-form />
            </div>
        </div>
    </div>
@endsection
