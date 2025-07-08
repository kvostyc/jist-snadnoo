@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <x-home.partials.hero-section />

    {{-- Reservation Form  --}}
    {{-- Livewire Component --}}
    <livewire:reservation.reservation-form />

    <section class="py-16 bg-white" id="about">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-800 mb-4">{{ __('general.why_choose_us_title') }}</h3>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('general.why_choose_us_subtitle') }}</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="rounded-lg border bg-card text-card-foreground shadow-sm text-center hover:shadow-lg transition-shadow border-orange-100">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-star w-8 h-8 text-orange-500">
                                <path
                                    d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
                                </path>
                            </svg></div>
                        <h3 class="font-semibold tracking-tight text-xl text-gray-800">{{ __('general.why_quality_title') }}
                        </h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-gray-600">{{ __('general.why_quality_text') }}</p>
                    </div>
                </div>
                <div
                    class="rounded-lg border bg-card text-card-foreground shadow-sm text-center hover:shadow-lg transition-shadow border-orange-100">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-users w-8 h-8 text-orange-500">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg></div>
                        <h3 class="font-semibold tracking-tight text-xl text-gray-800">{{ __('general.why_team_title') }}
                        </h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-gray-600">{{ __('general.why_team_text') }}</p>
                    </div>
                </div>
                <div
                    class="rounded-lg border bg-card text-card-foreground shadow-sm text-center hover:shadow-lg transition-shadow border-orange-100">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-calendar w-8 h-8 text-orange-500">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg></div>
                        <h3 class="font-semibold tracking-tight text-xl text-gray-800">{{ __('general.why_easy_title') }}
                        </h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-gray-600">{{ __('general.why_easy_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Us Section --}}
    <section class="py-16 bg-gray-50" id="contact">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">{{ __('general.contact_title') }}</h3>
                    <p class="text-lg text-gray-600">{{ __('general.contact_subtitle') }}</p>
                </div>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-orange-100">
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-map-pin w-5 h-5 mr-2 text-orange-500">
                                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>{{ __('general.contact_address_title') }}</h3>
                        </div>
                        <div class="p-6 pt-0">
                            <p class="text-gray-600">{!! nl2br(e(__('general.contact_address'))) !!}</p>
                        </div>
                    </div>
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm border-orange-100">
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-phone w-5 h-5 mr-2 text-orange-500">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>{{ __('general.contact_contact_title') }}</h3>
                        </div>
                        <div class="p-6 pt-0 space-y-2">
                            <p class="text-gray-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4 mr-2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>{{ __('general.contact_phone') }}</p>
                            <p class="text-gray-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4 mr-2">
                                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                </svg>{{ __('general.contact_email') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
