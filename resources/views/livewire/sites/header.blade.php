<div class="d-flex justify-content-between gap-1 mb-1">
    </button>
    <button wire:click="create" wire:target='create' wire:loading.attr='disabled' type="button"
        class="btn btn-sm btn-outline-primary d-flex items-center gap-1">
        <div wire:loading wire:target='create' class="m-0 d-flex align-items-center">
            <span wire:loading wire:target='create' class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span wire:loading wire:target='create' class="visually-hidden" role="status">Loading...</span>
        </div>
        <i class="bi bi-plus-lg"></i> Nouveau
    </button>
    <input wire:model.live.debounce.300ms='q' type="text" class="form-control form-control-sm"
        placeholder="Chercher...">
    <div class="col-auto">
        <select wire:model.live='pagination' class="form-select form-select-sm">
            @foreach ($pagination_options as $pagination_option)
                <option value="{{ $pagination_option }}">{{ $pagination_option }}</option>
            @endforeach
        </select>
    </div>
</div>
