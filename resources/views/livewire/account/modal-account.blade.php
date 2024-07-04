<div wire:ignore.self class="modal fade modal-animate" id="modalAccount" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rekening</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <x-partials.flash-message />

                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Nama Rekening</label>
                    <input type="text" class="form-control" wire:model="name" id="exampleInputEmail1" />
                </div>



                 @if ($accounts != null)
                    <div class="new-task">
                        @foreach ($accounts as $account)
                            <div class="to-do-list mb-3">
                                <div class="d-inline-block w-100">

                                    <div class="d-flex align-items-center justify-content-between w-100">

                                        <label>{{ $account->name }}</label>

                                        <button type="button" wire:click="deleteAccount({{ $account->id }})"
                                            wire:confirm="Yakin ingin hapus rekening ini?"
                                            class="btn btn-icon btn-danger avtar-xs mb-0 remove-task"
                                            wire:loading.attr="disabled">X</button>
                                    </div>
                                    
                                </div>

                            </div>
                        @endforeach



                    </div>
                @endif 

            </div>











            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary shadow-2" wire:click='insertAccount()'>Tambah Rekening</button>
            </div>
        </div>
    </div>

</div>
