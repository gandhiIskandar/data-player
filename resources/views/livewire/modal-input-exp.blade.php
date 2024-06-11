<div wire:ignore.self class="modal fade modal-animate" id="modalExp" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <x-partials.flash-message />
                <form wire:submit='proceedExp'>

                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Keterangan</label>
                        <input type="text" class="form-control" wire:model="form.detail" id="exampleInputEmail1"
                            placeholder="Masukan Keterangan" required />
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect1">Rekening</label>
                        <select class="form-select" wire:model='form.account_id' id="exampleFormControlSelect1" required>
                            <option value="">Pilih Rekening</option>
                            @foreach ($accounts as $account)
                            <option value={{ $account->id }}>{{ $account->name }}</option>
                                
                            @endforeach
                            

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
            $(document).ready(function() {

                $wire.on('showModalExpJS', (data) => {

                    $('#modalExp').modal('show');


                });
                
                $wire.on('removeConfirmExpJS', (data)=>{
                if(confirm('Yakin ingin hapus data pengeluaran ini ?')){
                $wire.dispatch('removeExp',[data.expenditure_id]);
                }

            });

        });
        </script>
    @endscript


@endpush
