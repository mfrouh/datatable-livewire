<div class="flex justify-between items-center mb-3">
    <div class="flex items-center">
        <h3 class="text-gray-600 text-xl font-medium">{{ __($tableName) }}</h3>
    </div>
    <div class="flex items-center">
        @foreach ($headerEvents as $key => $event)
            @can($tablePermissions[$key] ?? null)
                <button
                    class="p-2 text-white mx-1 bg-blue-700 text-sm rounded-xl shadow-md float-right outline-none focus:outline-none hover:shadow-sm hover:bg-blue-900"
                    wire:click="{{ $event->headerEvents }}">
                    @if ($event->filename)
                        {{ __($event->filename . '.' . $event->label) }}
                    @else
                        {{ __($event->label) }}
                    @endif
                </button>
            @endcan
        @endforeach
        @foreach ($headerUrls as $key => $url)
            @can($tablePermissions[$key] ?? null)
                <button
                    class="p-2 text-white mx-1 bg-blue-700 text-sm rounded-xl shadow-md float-right outline-none focus:outline-none hover:shadow-sm hover:bg-blue-900"
                    href="{{ $url->headerUrls }}">
                    @if ($url->filename)
                        {{ __($url->filename . '.' . $url->label) }}
                    @else
                        {{ __($url->label) }}
                    @endif
                </button>
            @endcan
        @endforeach
    </div>
</div>
