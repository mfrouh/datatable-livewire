<div class="flex flex-col mt-2 mb-2">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                @include('datatables::datatable.thead')
                <tbody class="bg-white">
                    @forelse ($alldata as $k=> $item)
                        @include('datatables::datatable.tinfo')
                    @empty
                        @include('datatables::datatable.notfound')
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
