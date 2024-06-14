<div wire:ignore.self class="modal fade modal-animate" id="animateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @if($edit)
                <h5 class="modal-title">Edit Transaksi</h5>
                @else
                <h5 class="modal-title">Tambah Transaksi</h5>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <x-partials.flash-message />
                <form wire:submit='procedTransaction'>
                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" wire:model.live="form.username"
                            id="exampleInputEmail1" placeholder="Masukan Username" required {{ $edit ? "disabled" : "" }} />
                        @if ($exist == 1 && !$edit)
                            <small id="emailHelp" class="form-text text-muted">Username tersedia</small>
                        @elseif($exist == 2 && !$edit)
                            <small id="emailHelp" class="form-text text-muted">Username belum tersedia </small>
                        @endif

                    </div>

                    @if ($exist == 2)
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Nomor Handphone</label>
                            <input type="text" class="form-control" wire:model.live="form.phone_number"
                                id="exampleInputEmail1" placeholder="Masukan Nomor Handphone" required />
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect1">Jenis Transaksi</label>
                        <select class="form-select" wire:model.live='form.type' id="exampleFormControlSelect1" required>
                            <option value="">Pilih Jenis Transaksi</option>
                        
                                <option value=1 class="{{ in_array(9, session('privileges')) ? "" : "d-none" }}">Withdraw</option>
                                {{-- jika user baru maka belum bisa wd --}}
                            
                            <option value=2
                            class="{{ in_array(5, session('privileges')) ? "" : "d-none" }}">Deposit</option>

                        </select>
                    </div>
                    <label class="form-label" for="amount">Jumlah</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" id="amount" wire:model='form.amount' class="form-control"
                            aria-label="Amount (to the nearest dollar)" required />

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary shadow-2">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


@push('script')

    @script
        <script>

            $wire.on('showModalTransactionJS', (data)=>{

                $('#animateModal').modal('show');


            });

            $wire.on('deleteTransactionConfirmJS', (data)=>{
                if(confirm('Yakin ingin hapus transaksi ' + data.transaction.member.username  + '?')){
                $wire.dispatch('removeTransaction',[data.transaction]);
                }
            });

        </script>
    @endscript


@endpush
