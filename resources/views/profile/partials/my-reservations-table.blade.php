@props([
    "reservations",
])

<div class="overflow-x-auto w-full">
    <table class="table">
        <thead>
            <tr class="text-gray-950">
                <th class="text-gray-950">#</th>
                <th class="text-gray-950">{{ __('reservation.date') }}</th>
                <th class="text-gray-950">{{ __('reservation.time') }}</th>
                <th class="text-gray-950">{{ __('reservation.guests') }}</th>
                <th class="text-gray-950">{{ __('reservation.status') }}</th>
                <th class="text-gray-950">{{ __('reservation.table') }}</th>
                <th class="text-gray-950">{{ __('reservation.created_at') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $i => $reservation)
                <tr class="text-gray-950">
                    <th class="text-gray-950">{{ $i + 1 }}</th>
                    <td class="text-gray-950">{{ \Carbon\Carbon::parse($reservation->date)->format('d.m.Y') }}</td>
                    <td class="text-gray-950">{{ $reservation->time }}</td>
                    <td class="text-gray-950">{{ $reservation->guest_count }}</td>
                    <td>
                        @if($reservation->reservation_status)
                            @php
                                $reservationStatusColor = $reservation->reservation_status->color_hex;
                            @endphp
                            <span class="badge bg-transparent font-bold" style="border-color: {{ $reservationStatusColor }}; color: {{ $reservationStatusColor }}">
                                {{ $reservation->reservation_status->name }}
                            </span>
                        @else
                            <span class="badge badge-ghost">-</span>
                        @endif
                    </td>
                    <td class="text-gray-950">
                        @if($reservation->table)
                            {{ $reservation->table->name ?? ('#' . $reservation->table->id) }}
                        @else
                            <span class="badge badge-ghost">-</span>
                        @endif
                    </td>
                    <td class="text-gray-950">
                        {{ $reservation->created_at?->format('d.m.Y H:i') ?? '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-gray-500 py-4">
                        {{ __('reservation.no_reservations') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
