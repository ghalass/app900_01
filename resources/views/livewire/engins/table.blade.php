<table class="table table-sm table-hover ">
    <thead>
        <th>#</th>
        <th>Parc</th>
        <th>Engin</th>
        <th>Type Parc</th>
        <th>Site</th>
        <th>Description</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($engins as $engin)
            <tr wire:key='{{ $engin->id }}'>
                <td>{{ $engin->id }}</td>
                <td>{{ $engin->parc->name }}</td>
                <td>{{ $engin->name }}</td>
                <td>{{ $engin->parc->typeparc->name }}</td>
                <td>{{ $engin->site->name }}</td>
                <td>{{ $engin->description }}</td>
                <td>
                    <div class="d-flex align-items-center justify-content-center">
                        <button wire:click="edit({{ $engin }})" wire:target='edit({{ $engin }})'
                            wire:loading.attr='disabled' type="button"
                            class="d-flex align-items-center justify-content-between btn btn-sm text-primary d-flex items-center gap-1">
                            <div wire:loading wire:target='edit({{ $engin }})'
                                class="m-0 d-flex align-items-center">
                                <span wire:loading wire:target='edit({{ $engin }})'
                                    class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span wire:loading wire:target='edit({{ $engin }})' class="visually-hidden"
                                    role="status">Loading...</span>
                            </div>
                            <i class="bi bi-pen"></i>
                        </button>

                        <button wire:click="delete({{ $engin }})" wire:target='delete({{ $engin }})'
                            wire:loading.attr='disabled' type="button"
                            class="d-flex align-items-center justify-content-between btn btn-sm text-danger d-flex items-center gap-1">
                            <div wire:loading wire:target='delete({{ $engin }})'
                                class="m-0 d-flex align-items-center">
                                <span wire:loading wire:target='delete({{ $engin }})'
                                    class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                <span wire:loading wire:target='delete({{ $engin }})' class="visually-hidden"
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
<div class="d-flex justify-content-end mt-2">{{ $engins->onEachSide(1)->links() }}</div>
