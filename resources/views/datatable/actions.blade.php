<td class="text-center px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    @if ($countActionsPerimssions > 0)
        <div x-data="{ dropdownOpenAction: false }" class="relative">
            <button @click="dropdownOpenAction = ! dropdownOpenAction"
                class="relative block h-4 w-8 float-@lang('langDatatables::setting.right') rounded-full overflow-hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                </svg>
            </button>

            <div x-show="dropdownOpenAction" @click="dropdownOpenAction = false"
                class="fixed inset-0 h-full w-full z-10"></div>
            <div x-show="dropdownOpenAction" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="origin-top-right fixed @lang('langDatatables::setting.right')-6 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-40"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                @click="dropdownOpenAction = false" style="display:none;">
                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                    @foreach ($actionEvents as $key => $event)
                        @can($tablePermissions[$key] ?? null)
                            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition cursor-pointer"
                                wire:click='{{ $event->actionEvents }}'>
                                @if ($event->filename)
                                    {{ __($event->filename . '.' . $event->label) }}
                                @else
                                    {{ __($event->label) }}
                                @endif
                            </a>
                        @endcan
                    @endforeach
                    @foreach ($actionUrls as $key => $url)
                        @can($tablePermissions[$key] ?? null)
                            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition cursor-pointer"
                                href="{{ $url->actionUrls }}">
                                {{ dump(str_replace('%3E%3E','', str_replace('%3C%3C','$item->', $url->actionUrls))) }}
                                @if ($url->filename)
                                    {{ __($url->filename . '.' . $url->label) }}
                                @else
                                    {{ __($url->label) }}
                                @endif
                            </a>
                        @endcan
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</td>
