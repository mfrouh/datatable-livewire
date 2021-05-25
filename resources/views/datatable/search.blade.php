<div class="flex justify-between items-center">
    <div class="flex items-center">

        {{-- delete selected --}}
        @can($tablePermissions['deleteSelected'] ?? null)
            <div class="relative">
                @if (count($selected) > 0)
                    <a class="bg-red-700 shadow-sm rounded p-2 m-1 text-white cursor-pointer" wire:click='deleteSelected'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        ({{ count($selected) }})</a>
                @endif
            </div>
        @endcan

        {{-- perPage Pagination --}}
        <div class="relative">
            <select wire:model="perPage"
                class="h-full rounded border block appearance-none w-full bg-white shadow-sm text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-whit">
                @foreach ($perPages as $item)
                    <option>{{ $item }}</option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                </svg>
            </div>
        </div>

        {{-- filter --}}
        @if ($filters)
            @foreach ($filters as $key => $filter)
                <div class="relative mx-1">
                    <select wire:model="{{ $key }}"
                        class="h-full rounded border block appearance-none w-full bg-white shadow-sm text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-whit">
                        <option value="">{{ __('setting.select') }} {{ __('datatable.' . $key) }}</option>
                        @foreach ($filter as $key => $text)
                            <option value="{{ $key }}">{{ __($text) }}</option>
                        @endforeach
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            @endforeach
        @endif

        {{-- export --}}

        @can($tablePermissions['export'] ?? null)
            <div class="relative">
                @foreach ($exportTypes as $key => $type)
                    @if (count($selected) > 0)
                        <a class="bg-white shadow-sm rounded p-2 m-1 text-black cursor-pointer"
                            wire:click='exportSelected("{{ $key }}")'>
                            {{ __('langDatatables::'.$type) }}({{ count($selected) }})
                        </a>
                    @else
                        <a class="bg-white shadow-sm rounded p-2 m-1 text-black cursor-pointer"
                            wire:click='exportAll("{{ $key }}")'>
                            {{ __('langDatatables::'.$type) }}
                        </a>
                    @endif
                @endforeach
            </div>
        @endcan

    </div>

    {{-- search --}}
    <div class="relative flex items-center">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                <path
                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                </path>
            </svg>
        </span>
        <input placeholder="@lang('langDatatables::setting.search')" wire:model="search"
            class="appearance-none rounded-xl shadow-sm  block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
    </div>
</div>
