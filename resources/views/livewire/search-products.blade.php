<div id="search-module">
    <h2 for="search">Search</h2>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <input wire:loading.remove wire:model.debounce.800ms="searchInput" type="text" class="mb-3 form-control">
    <div wire:loading wire:target="searchInput">
        <p>Search request...</p>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($models as $item)
                <tr>
                    <th scope="row">{{ $item['id'] ?? 'empty' }}</th>
                    <td style="word-break: break-all;">{{ $item['image_url'] ?? 'empty' }}</td>
                    <td>{{ $item['product_name'] }}</td>
                    <td>{{ $item['categories'] ?? 'empty' }}</td>
                    <td>
                        <button class="btn btn-success" wire:click="updateItem('{{ $item['product_name'] }}', {{ json_encode($item) }})">
                            Save/Update
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <p>Products not found...</p>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $models->links() }}
</div>
