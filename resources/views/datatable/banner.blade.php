<div class="flex justify-between items-center mb-3">
    <div class="flex items-center">
        <h3 class="text-gray-600 text-xl font-medium">{{ __('datatable.' . Str::of($tableName)->plural()) }}</h3>
    </div>
    <div class="flex items-center">
        @foreach ($headerEvents as $key => $event)
            @can($tablePermissions[$key] ?? null)
                <button
                    class="p-2 text-white mx-1 bg-blue-700 text-sm rounded-xl shadow-md float-right outline-none focus:outline-none hover:shadow-sm hover:bg-blue-900"
                    wire:click="{{ $key }}">{{ __($event) }}</button>
            @endcan
        @endforeach
        @foreach ($headerUrls as $key => $url)
            @can($tablePermissions[$key] ?? null)
                <button
                    class="p-2 text-white mx-1 bg-blue-700 text-sm rounded-xl shadow-md float-right outline-none focus:outline-none hover:shadow-sm hover:bg-blue-900"
                    href="{{ $key }}">{{ __($url) }}</button>
            @endcan
        @endforeach
    </div>
</div>
