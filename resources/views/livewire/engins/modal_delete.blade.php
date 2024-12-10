<div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deleteModalLabel" aria-hidden="false" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">
                    Supprimer un engin
                </h1>
                <button wire:click="formReset" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-danger">Voulez-vous vraiment supprimer ce engin?</p>
                <p class="text-info">{{ $name }}</p>
            </div>
            <div class="modal-footer">
                <button wire:click="formReset" type="button" class="btn btn-sm btn-outline-secondary"
                    data-bs-dismiss="modal">
                    Annuler
                </button>

                <button wire:click='destroy' type="submit" wire:target='destroy' wire:loading.attr='disabled'
                    class="d-flex align-items-center justify-content-between btn btn-sm btn-outline-danger gap-1"
                    style="width: 100px;">
                    <div wire:loading wire:target='destroy' class="m-0 d-flex align-items-center">
                        <span wire:loading wire:target='destroy' class="spinner-border spinner-border-sm"
                            aria-hidden="true"></span>
                        <span wire:loading wire:target='destroy' class="visually-hidden"
                            role="status">Loading...</span>
                    </div>
                    Supprimer
                </button>
            </div>
        </div>
    </div>
</div>
