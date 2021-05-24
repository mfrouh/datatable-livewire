<thead>
    <tr>
        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">
            <input type="checkbox" class="float-@lang('langDatatables::setting.left')" wire:model='selectAll'>
        </th>
        @foreach ($columns as $column)
            @if ($column->sortable)
                <th wire:click="sortBy('{{ $column->name }}')"
                    class="px-6 py-3 border-b  border-gray-200 bg-gray-50 text-center text-xs leading-4 cursor-pointer font-medium text-gray-500 uppercase tracking-wider">
                    {{ __($column->label) }} </th>
            @else
                <th
                    class="px-6 py-3 border-b  border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    {{ __($column->label) }}</th>
            @endif
        @endforeach
        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
    </tr>
</thead>
