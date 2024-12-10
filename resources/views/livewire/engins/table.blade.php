<table class="table table-sm table-hover ">
    <thead>
        <th>#</th>
        <th>typeparc</th>
        <th>Description</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($typeparcs as $typeparc)
            <tr wire:key='{{ $typeparc->id }}'>
                <td>{{ $typeparc->id }}</td>
                <td>{{ $typeparc->name }}</td>
                <td>{{ $typeparc->description }}</td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <button wire:click="edit({{ $typeparc }})" wire:target='edit({{ $typeparc }})'
                            wire:loading.attr='disabled' type="button"
                            class="d-flex align-items-center justify-content-between btn btn-sm text-primary d-flex items-center gap-1">
                            <div wire:loading wire:target='edit({{ $typeparc }})'
                                class="m-0 d-flex align-items-center">
                                <span wire:loading wire:target='edit({{ $typeparc }})'
                                    class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span wire:loading wire:target='edit({{ $typeparc }})' class="visually-hidden"
                                    role="status">Loading...</span>
                            </div>
                            <i class="bi bi-pen"></i>
                        </button>

                        <button wire:click="delete({{ $typeparc }})" wire:target='delete({{ $typeparc }})'
                            wire:loading.attr='disabled' type="button"
                            class="d-flex align-items-center justify-content-between btn btn-sm text-danger d-flex items-center gap-1">
                            <div wire:loading wire:target='delete({{ $typeparc }})'
                                class="m-0 d-flex align-items-center">
                                <span wire:loading wire:target='delete({{ $typeparc }})'
                                    class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span wire:loading wire:target='delete({{ $typeparc }})' class="visually-hidden"
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

<div class="d-flex justify-content-end mt-2">{{ $typeparcs->onEachSide(1)->links() }}</div>
