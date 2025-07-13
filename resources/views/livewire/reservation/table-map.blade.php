<div class="p-6 pt-0">
    @if ($reservationSuccess)
        <div class="text-center py-8" x-data="{ countdown: 5 }" x-init="
            // Scroll to top when reservation is confirmed
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            const interval = setInterval(() => {
                countdown--;
                if (countdown <= 0) {
                    clearInterval(interval);
                    setTimeout(() => {
                        window.location.href = '{{ route('home') }}';
                    }, 1000);
                }
            }, 1000);
        ">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-circle-check-big w-16 h-16 text-green-500 mx-auto mb-4">
                <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                <path d="m9 11 3 3L22 4"></path>
            </svg>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ __('reservation.reservation_confirmed') }}</h3>
            <p class="text-gray-600 mb-4">{{ __('reservation.reservation_details_sent') }}</p>
            <div class="text-sm text-orange-600 font-medium">
                <span x-show="countdown > 0" x-text="
                    countdown === 1 
                        ? '{{ __('reservation.redirect_countdown_one', ['seconds' => ':seconds']) }}'.replace(':seconds', countdown)
                        : countdown >= 2 && countdown <= 4
                            ? '{{ __('reservation.redirect_countdown_few', ['seconds' => ':seconds']) }}'.replace(':seconds', countdown)
                            : '{{ __('reservation.redirect_countdown_plural', ['seconds' => ':seconds']) }}'.replace(':seconds', countdown)
                "></span>
                <span x-show="countdown <= 0">
                    {{ __('reservation.redirect_now') }}
                    <a href="{{ route('home') }}" class="underline hover:text-orange-700 ml-1">{{ __('reservation.home_page') }}</a>
                </span>
            </div>
        </div>
    @else
        <div class="bg-gray-50 p-4 rounded-lg">
            <h3 class="font-semibold text-gray-800 mb-2">{{ __('reservation.your_reservation') }}</h3>
            <div class="grid grid-cols-3 gap-4 text-sm text-gray-600">
                <div>
                    <strong>{{ __('reservation.date') }}:</strong>
                    <br>{{ \Carbon\Carbon::parse($date)->format('d.m.Y') ?? '-' }}
                </div>
                <div>
                    <strong>{{ __('reservation.time') }}:</strong><br>{{ $time ?? '-' }}
                </div>
                <div>
                    <strong>{{ __('reservation.guests') }}:</strong><br>{{ $guest_count ?? '-' . __('reservation.person') }}
                </div>
            </div>
        </div>

        <div class="p-4 border my-2 shadow-md rounded-md">
            <div class="flex flex-col space-y-1.5 p-6 bg-gray-50 rounded-lg my-4 border">
                <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-map-pin w-5 h-5 text-orange-500">
                        <path
                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                        </path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span class="text-gray-950">{{ __('reservation.choose_table') }}</span>
                </h3>
                <p class="text-sm text-gray-600">
                    {{ __('reservation.available_tables_for', ['date' => \Carbon\Carbon::parse($date)->format('d.m.Y') ?? '-', 'time' => $time ?? '-', 'guests' => $guest_count ?? '-']) }}
                </p>
            </div>

            <div class="relative">
                <svg viewBox="0 0 450 550" class="w-full h-96 bg-gray-50 rounded-lg border py-2">
                    <rect x="10" y="10" width="430" height="530" fill="none" stroke="#d1d5db" stroke-width="2"
                        rx="8"></rect>
                    <rect x="10" y="50" width="80" height="8" fill="#93c5fd" stroke="#3b82f6" stroke-width="1">
                    </rect>
                    <rect x="10" y="150" width="80" height="8" fill="#93c5fd" stroke="#3b82f6" stroke-width="1">
                    </rect>
                    <rect x="10" y="250" width="80" height="8" fill="#93c5fd" stroke="#3b82f6" stroke-width="1">
                    </rect>
                    <rect x="120" y="20" width="200" height="40" fill="#a78bfa" stroke="#7c3aed" stroke-width="2"
                        rx="5"></rect>
                    <text x="220" y="45" text-anchor="middle" class="text-sm font-medium fill-white">{{ __('reservation.bar') }}</text>
                    <rect x="360" y="20" width="70" height="100" fill="#fbbf24" stroke="#f59e0b" stroke-width="2"
                        rx="5"></rect>
                    <text x="395" y="75" text-anchor="middle" class="text-sm font-medium fill-white">{{ __('reservation.kitchen') }}</text>
                    @foreach ($tables as $table)
                        @php
                            $fill = $table->color_hex;
                            $cursor = $table->status === 'available' ? 'cursor-pointer' : 'cursor-not-allowed';
                            $isSelected = $selectedTable && $selectedTable->id === $table->id;
                            $stroke = $isSelected ? '#f59e0b' : $fill;
                            $strokeWidth = $isSelected ? 4 : 1;
                        @endphp
                        @if ($table->type === 'square')
                            <rect x="{{ $table->x }}" y="{{ $table->y }}" width="60" height="40"
                                rx="5" fill="{{ $fill }}" stroke="{{ $stroke }}"
                                stroke-width="{{ $strokeWidth }}"
                                class="transition-all duration-200 {{ $cursor }}"
                                @if ($table->status === 'available') wire:click="selectTable({{ $table->id }})" @endif />
                        @elseif($table->type === 'round')
                            <circle cx="{{ $table->x }}" cy="{{ $table->y }}" r="25"
                                fill="{{ $fill }}" stroke="{{ $stroke }}"
                                stroke-width="{{ $strokeWidth }}"
                                class="transition-all duration-200 {{ $cursor }}"
                                @if ($table->status === 'available') wire:click="selectTable({{ $table->id }})" @endif />
                        @elseif($table->type === 'booth')
                            <rect x="{{ $table->x }}" y="{{ $table->y }}" width="60" height="40"
                                rx="10" fill="{{ $fill }}" stroke="{{ $stroke }}"
                                stroke-width="{{ $strokeWidth }}"
                                class="transition-all duration-200 {{ $cursor }}"
                                @if ($table->status === 'available') wire:click="selectTable({{ $table->id }})" @endif />
                        @endif
                        <text x="{{ $table->type === 'round' ? $table->x : $table->x + 30 }}"
                            y="{{ $table->type === 'round' ? $table->y + 4 : $table->y + 24 }}" text-anchor="middle"
                            class="text-xs font-bold fill-white pointer-events-none">{{ $table->id }}</text>
                        <text x="{{ $table->type === 'round' ? $table->x : $table->x + 30 }}"
                            y="{{ $table->type === 'round' ? $table->y + 16 : $table->y + 36 }}" text-anchor="middle"
                            class="text-xs fill-gray-600 pointer-events-none">{{ $table->available_for_guest_count }}</text>
                    @endforeach
                </svg>
                <div class="mt-4 flex flex-wrap gap-4 text-sm">
                    @foreach ($statuses as $status)
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 rounded" style="background: {{ $status->color_hex }}"></div>
                            <span class="text-gray-950">{{ $status->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if ($selectedTable)
            <div class="mt-4 p-4 bg-orange-50 border border-orange-200 rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-800">
                            {{ __('reservation.selected_table', ['name' => $selectedTable->name]) }}</h4>
                        <p class="text-sm text-gray-600">
                            {{ __('reservation.table_suitable_for', [
                                'count' => $selectedTable->available_for_guest_count,
                                'type' => __(
                                    $selectedTable->type === 'square'
                                        ? 'reservation.square'
                                        : ($selectedTable->type === 'round'
                                            ? 'reservation.round'
                                            : ($selectedTable->type === 'booth'
                                                ? 'reservation.booth'
                                                : ucfirst($selectedTable->type))),
                                ),
                            ]) }}
                        </p>
                    </div>
                    <div
                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-primary/80 bg-orange-500 text-white">
                        {{ __('reservation.selected') }}
                    </div>
                </div>
            </div>
            <div class="my-4">
            </div>
        @endif

        @if ($errors->any())
            <div class="my-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <div class="flex gap-4">
                <button wire:click="reserveTable" wire:loading.attr="disabled" wire:target="reserveTable"
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap ring-offset-background 
                focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 
                disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 
                bg-primary hover:bg-primary/90 h-10 px-4 flex-1 bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600
                 hover:to-amber-600 text-white
                 font-semibold py-3 text-lg rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                    <span wire:loading.remove wire:target="reserveTable">{{ __('reservation.reserve') }}</span>
                    <span wire:loading wire:target="reserveTable" wire:loading.class="!flex" class="!flex-row !items-center !gap-2">
                        <span>{{ __('reservation.reserving') }}</span>
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                            </path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    @endif
</div>