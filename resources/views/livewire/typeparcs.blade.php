<div>

    {{-- ADD BUTTON & SEARCH --}}
    <div class="d-flex justify-content-between gap-1 mb-1">
        </button>
        <button wire:click="create" wire:target='create' wire:loading.attr='disabled' type="button"
            class="btn btn-sm btn-outline-primary d-flex items-center gap-1">
            <div wire:loading wire:target='create' class="m-0 d-flex align-items-center">
                <span wire:loading wire:target='create' class="spinner-border spinner-border-sm"
                    aria-hidden="true"></span>
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

    {{-- TABLE DATA --}}
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
                                    <span wire:loading wire:target='delete({{ $typeparc }})'
                                        class="visually-hidden" role="status">Loading...</span>
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



    {{-- CREATE / EDIT Modal --}}
    <div wire:ignore.self class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="false" aria-modal="true">
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
                            <input wire:model='name' type="text"
                                class="form-control @error('name') is-invalid @enderror" id="floatingInput"
                                placeholder="typeparc">
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



    {{-- DELETE Modal --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="false" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">
                        Supprimer un typeparc
                    </h1>
                    <button wire:click="formReset" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="text-danger">Voulez-vous vraiment supprimer ce typeparc?</p>
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


    {{-- SCRIPTS --}}
    @script
        <script>
            window.addEventListener('close-modal', event => {
                $('#createModal').modal('hide');
                $('#deleteModal').modal('hide');
            });

            window.addEventListener('show-create-modal', event => {
                $('#createModal').modal('show');
            });

            window.addEventListener('show-delete-modal', event => {
                $('#deleteModal').modal('show');
            });

            $(document).ready(function() {
                // alert("The paragraph was clicked.");
            });
        </script>
    @endscript

</div>
