<div wire:ignore.self class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="createModalLabel" aria-hidden="false" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">
                    @if (isset($id))
                        Modifier un typeparc
                    @else
                        Ajouter un typeparc
                    @endif
                </h1>
                <button wire:click="formReset" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input wire:model='name' type="text" class="form-control @error('name') is-invalid @enderror"
                            id="floatingInput" placeholder="typeparc">
                        <label for="floatingInput">Typeparc</label>
                        @error('name')
                            <p class="text-danger fst-italic fw-lighter">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea wire:model='description' class="form-control @error('description') is-invalid @enderror"
                            placeholder="Description" id="floatingTextarea" style="height: 100px"></textarea>
                        <label for="floatingTextarea">Description</label>
                        @error('description')
                            <p class="text-danger fst-italic fw-lighter">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button wire:click="formReset" type="button" class="btn btn-sm btn-outline-secondary"
                        data-bs-dismiss="modal">
                        Annuler
                    </button>

                    <button type="submit" wire:target='store' wire:loading.attr='disabled'
                        class="d-flex align-items-center justify-content-between btn btn-sm btn-outline-primary gap-1"
                        style="width: 100px;">
                        <div wire:loading wire:target='store' class="m-0 d-flex align-items-center">
                            <span wire:loading wire:target='store' class="spinner-border spinner-border-sm"
                                aria-hidden="true"></span>
                            <span wire:loading wire:target='store' class="visually-hidden"
                                role="status">Loading...</span>
                        </div>
                        @if (isset($id))
                            Modifier
                        @else
                            Ajouter
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
