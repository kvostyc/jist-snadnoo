<div>
    <div class="filament-forms-card-component bg-white dark:bg-gray-800 p-2 rounded-xl d-inline">
        <h2 class="filament-header-heading text-xl font-bold tracking-tight pt-1 text-gray-600 dark:text-gray-300">
            Najnovšie udalosti</h2>
        @if (count($unreadNotifications))
            <small class="mt-5 cursor-pointer" wire:click="markAsReadAll">[ Odznačiť všetko ]</small>
        @endif
        <div>
            @forelse ($unreadNotifications as $item)
                <div id="toast-default"
                    class="flex items-center w-full p-4 text-black rounded-lg shadow my-2"
                    style="background-color: {{ $item->data['background-color'] ?? '#10b981' }}"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                        @if (strlen($item->data['icon']) > 50)
                            {!! $item->data['icon'] !!}
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>
                        @endif
                    </div>
                    <div class="ml-3 text-sm font-normal"><a wire:click="markAsRead('{{ $item->id }}', false)"
                            href="@isset($item->data['background-color']) {{ $item->data['link'] }} @endisset">
                            @isset($item->data['message'])
                                {!! $item->data['message'] !!}</a>
                        @endisset
                        @isset($item->data['body'])
                            {!! $item->data['body'] !!}
                        @endisset
                    </div>
                    <a wire:click="markAsRead('{{ $item->id }}')"
                        class="cursor-pointer ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        data-dismiss-target="#toast-default" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </a>
                </div>
            @empty
                <div class="py-2 italic text-gray-600 dark:text-gray-300">Zatiaľ neprebehla žiadna nová udalosť</div>
            @endforelse
        </div>
    </div>
</div>
