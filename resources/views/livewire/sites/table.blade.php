<table class="table table-sm table-hover ">
    <thead>
        <th>#</th>
        <th>Site</th>
        <th>Description</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($sites as $site)
            <tr wire:key='{{ $site->id }}'>
                <td>{{ $site->id }}</td>
                <td>{{ $site->name }}</td>
                <td>{{ $site->description }}</td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <button wire:click="edit({{ $site }})" wire:target='edit({{ $site }})'
                            wire:loading.attr='disabled' type="button"
                            class="d-flex align-items-center justify-content-between btn btn-sm text-primary d-flex items-center gap-1">
                            <div wire:loading wire:target='edit({{ $site }})'
                                class="m-0 d-flex align-items-center">
                                <span wire:loading wire:target='edit({{ $site }})'
                                    class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span wire:loading wire:target='edit({{ $site }})' class="visually-hidden"
                                    role="status">Loading...</span>
                            </div>
                            <i class="bi bi-pen"></i>
                        </button>

                        <button wire:click="delete({{ $site }})" wire:target='delete({{ $site }})'
                            wire:loading.attr='disabled' type="button"
                            class="d-flex align-items-center justify-content-between btn btn-sm text-danger d-flex items-center gap-1">
                            <div wire:loading wire:target='delete({{ $site }})'
                                class="m-0 d-flex align-items-center">
                                <span wire:loading wire:target='delete({{ $site }})'
                                    class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span wire:loading wire:target='delete({{ $site }})' class="visually-hidden"
                                    role="status">Loading...</span>
                            </div>
                            <i class="bi bi-trash"></i>
                        </button>

                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end mt-2">{{ $sites->onEachSide(1)->links() }}</div>
