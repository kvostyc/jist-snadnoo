@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-min-56">
            <div class="flex flex-col lg:flex-row gap-6">
                {{-- Left Menu --}}
                @include('profile.partials.navigation')
                {{-- Right Content --}}
                <div class="flex-1 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        @include('profile.partials.my-reservations-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
