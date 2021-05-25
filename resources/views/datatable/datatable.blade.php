<div class="container mx-auto px-6 py-3">
    @include('datatables::datatable.banner')
    @include('datatables::datatable.search')
    @include('datatables::datatable.table')
    {{ $alldata->links() }}
    @foreach ($modals as $key => $item)
        @if ($item == $modal)
            @livewire($item,key($key))
        @endif
    @endforeach
</div>
