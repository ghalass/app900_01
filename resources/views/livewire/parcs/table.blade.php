<table class="table table-sm table-hover ">
    <thead>
        <th>#</th>
        <th>Parc</th>
        <th>Type</th>
        <th>Description</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($parcs as $parc)
            <tr wire:key='{{ $parc->id }}'>
                <td>{{ $parc->id }}</td>
                <td>{{ $parc->name }}</td>
                <td>{{ $parc->description }}</td>
                <td>{{ $parc->typeparc->name }}</td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <button wire:click="edit({{ $parc }})" wire:target='edit({{ $parc }})'
                            wire:loading.attr='disabled' type="button"
                            class="d-flex align-items-center justify-content-between btn btn-sm text-primary d-flex items-center gap-1">
                            <div wire:loading wire:target='edit({{ $parc }})'
                                class="m-0 d-flex align-items-center">
                                <span wire:loading wire:target='edit({{ $parc }})'
                                    class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span wire:loading wire:target='edit({{ $parc }})' class="visually-hidden"
                                    role="status">Loading...</span>
                            </div>
                            <i class="bi bi-pen"></i>
                        </button>

                        <button wire:click="delete({{ $parc }})" wire:target='delete({{ $parc }})'
                            wire:loading.attr='disabled' type="button"
                            class="d-flex align-items-center justify-content-between btn btn-sm text-danger d-flex items-center gap-1">
                            <div wire:loading wire:target='delete({{ $parc }})'
                                class="m-0 d-flex align-items-center">
                                <span wire:loading wire:target='delete({{ $parc }})'
                                    class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span wire:loading wire:target='delete({{ $parc }})' class="visually-hidden"
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
<div class="d-flex justify-content-end mt-2">{{ $parcs->onEachSide(1)->links() }}</div>
