<tr class="bg-white rounded-md m-2">
    <td class="text-center px-6 py-4 whitespace-no-wrap border-b border-gray-200">
        <input type="checkbox" class="float-@lang('langDatatables::setting.left')" wire:model="selected" value="{{ $item->id }}">
    </td>
    @foreach ($columns as $column)
        <td class="text-center px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            @switch($column->type)
                @case('Text')
                    {{ is_array(Arr::get($item, $column->value)) ? $item->$column->value : Arr::get($item, $column->value) }}
                @break
                @case('Number')
                    <span class="bg-green-300 rounded-xl p-2 shadow-md">
                        {{ is_array(Arr::get($item, $column->value)) ? $item->$column->value : Arr::get($item, $column->value) }}
                    </span>
                @break
                @case('Lang')
                    <span>
                        {{ is_array(Arr::get($item, $column->value)) ? $item->$column->value : __($column->filename . '.' . Arr::get($item, $column->value)) }}
                    </span>
                @break
                @case('Percentage')
                    <span>
                        {{ is_array(Arr::get($item, $column->value)) ? $item->$column->value : Arr::get($item, $column->value) }}
                        %
                    </span>
                @break
                @case('Minute')
                    <span>
                        {{ is_array(Arr::get($item, $column->value)) ? $item->$column->value : Arr::get($item, $column->value) }}
                        @lang('setting.min')
                    </span>
                @break
                @case('DateTime')
                    @if ($column->format)
                        <span class="shadow-sm p-1 text-sm">
                            {{ is_array(Arr::get($item, $column->value)) ? $item->$column->value : Arr::get($item, $column->value)?->format($column->format) }}
                        </span>
                    @else
                        <span class="shadow-sm p-1 text-sm">
                            {{ is_array(Arr::get($item, $column->value)) ? $item->$column->value : Arr::get($item, $column->value)?->diffforhumans() }}
                        </span>
                    @endif
                @break

                @default
                    {{ is_array(Arr::get($item, $column->value)) ? $item->$column->value : Arr::get($item, $column->value) }}
            @endswitch
        </td>
    @endforeach
    @include('datatables::datatable.actions')
</tr>
