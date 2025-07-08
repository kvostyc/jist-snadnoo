<section class="py-16 -mt-8 relative z-20 bg-orange-50" x-data="{
    date: $wire.entangle('date'),
    time: $wire.entangle('time'),
    guest_count: $wire.entangle('guest_count'),
    max_guest_count: $wire.entangle('max_guest_count'),
    init() {
        console.log(this.date, this.time, this.guest_count);
    }
}">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="shadow-sm bg-white border-0 rounded-md">
                <div class="flex flex-col space-y-1.5 p-6 text-center pb-6">
                    <h3 class="tracking-tight text-3xl font-bold text-gray-800">Rezervácia stola</h3>
                    <p class="text-lg text-gray-600">Vyberte si ideálny čas pre vášu návštevu</p>
                </div>
                <div class="p-6 pt-0">
                    <div class="space-y-6">
                        @if ($step == 1)
                            <form class="space-y-6" @submit.prevent="$wire.submitReservationTimes()">
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-700"
                                            for="date">{{ __('reservation.date') }} *</label>
                                        <select id="date" name="date"
                                            class="block w-full border-gray-300 rounded-md shadow-sm text-gray-950 focus:ring-orange-500 focus:border-orange-500"
                                            x-data="{
                                                dates: Array.from({ length: 10 }, (_, i) => {
                                                    let d = new Date();
                                                    d.setDate(d.getDate() + i);
                                                    let day = ('0' + d.getDate()).slice(-2);
                                                    let month = ('0' + (d.getMonth() + 1)).slice(-2);
                                                    let year = d.getFullYear();
                                                    return { value: year + '-' + month + '-' + day, label: day + '.' + month + '.' + year };
                                                })
                                            }" x-model="date">
                                            <option value="" selected>{{ __('reservation.select_date') }}</option>
                                            <template x-for="date in dates" :key="date.value">
                                                <option :value="date.value" x-text="date.label"></option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-700"
                                            for="time">{{ __('reservation.time') }} *</label>
                                        <select id="time" name="time"
                                            class="block w-full border-gray-300 rounded-md shadow-sm text-gray-950 focus:ring-orange-500 focus:border-orange-500"
                                            x-data="{ times: Array.from({ length: 13 }, (_, i) => { let h = 15 + Math.floor(i / 2); let m = i % 2 === 0 ? '00' : '30'; return (h < 10 ? '0' : '') + h + ':' + m; }) }" x-model="time">
                                            <option value="" selected>{{ __('reservation.select_time') }}</option>
                                            <template x-for="t in times" :key="t">
                                                <option class="text-gray-950" :value="t" x-text="t">
                                                </option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-700"
                                            for="guests">{{ __('reservation.guests') }} *</label>
                                        <select id="guests" name="guests"
                                            class="block w-full border-gray-300 rounded-md shadow-sm text-gray-950 focus:ring-orange-500 focus:border-orange-500"
                                            x-model.number="guest_count">
                                            <option value="" selected>{{ __('reservation.select_guests') }}
                                            </option>
                                            <template x-for="i in max_guest_count" :key="i">
                                                <option class="text-gray-950" :value="i" x-text="i">
                                                </option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                                        <ul class="list-disc pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="pt-4">
                                    @auth
                                        @if ($step == 1)
                                            <button :disabled="!date || !time || !guest_count" wire:loading.attr="disabled"
                                                wire:target="submitReservationTimes"
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap ring-offset-background 
                                        focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 
                                        disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none 
                                        bg-primary hover:bg-primary/90 h-10 px-4 w-full bg-gradient-to-r
                                        from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-semibold py-3
                                        text-lg rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                                                <span wire:loading wire:target="submitReservationTimes"
                                                    class="animate-spin mr-2">&#9696;</span>
                                                {{ __('reservation.reservation_continue') }}
                                            </button>
                                        @endif
                                    @else
                                        <div class="flex flex-col items-center gap-2">
                                            <span
                                                class="text-orange-600 font-semibold">{{ __('reservation.login_required') }}</span>
                                            <button type="button"
                                                onclick="document.getElementById('auth-modal').showModal()"
                                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-orange-500 hover:bg-orange-600 h-10 px-4 w-full text-white font-semibold py-3 text-lg rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                                                {{ __('reservation.login_button') }}
                                            </button>
                                        </div>
                                    @endauth
                                </div>
                            </form>
                        @endif

                        @if ($step == 2)
                            <livewire:reservation.table-map :date="$date" :time="$time" :guest_count="$guest_count"
                                :key="auth()->id() ?? 'guest'" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
