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

                        
                        
                        <label class="form-label" for="norek">Rekening Member</label>
                            <div class="input-group mb-3">
                                <select class="form-select" wire:model.live='form.astaga' id="accountGebleg" style="max-width: 120px !important;" required>
                                    
                                    @foreach ($accounts as $account)
                                    <option value={{ $account->id }} {{ $loop->iteration == 1 ? 'selected' : '' }}>{{ $account->name }}</option>
                                        
                                    @endforeach
                                    
        
                                </select>

                                <input type="text" id="norek" wire:model='form.account_number' class="form-control"
                                aria-label="Amount (to the nearest dollar)" required />
                            </div>

                            <hr style="border-top: 2px solid black;">

                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect1">Jenis Transaksi</label>
                        <select class="form-select" wire:model.live='form.type' id="exampleFormControlSelect1" required>
                            <option value="">Pilih Jenis Transaksi</option>
                        
                                <option value=1 class="{{ privilegeAddWithdraw() ? "" : "d-none" }}">Withdraw</option>
                                {{-- jika user baru maka belum bisa wd --}}
                            
                            <option value=2
                            class="{{ privilegeAddDeposit() ? "" : "d-none" }}">Deposit</option>

                        </select>
                    </div>
                    @if($form->type !=0)
                    <div class="mb-3">
                        
                        <label class="form-label" for="exampleFormControlSelect1">{{ $form->type==2 ? "Dari Rekening (Member)" : "Ke Rekening (Member)" }}</label>
                        <select class="form-select" wire:model='form.account_id' id="exampleFormControlSelect1" required>
                            @foreach ($banks as $bank)
                            <option value={{ $bank->id }} {{ $loop->iteration == 1 ? 'selected' : '' }}>{{ $bank->name}}</option>
                                
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlSelect1">{{ $form->type==2 ? "Rekening Tujuan (Admin)" : "Dari Rekening (Admin)"  }}</label>
                        <select class="form-select" wire:model='form.account_id' id="exampleFormControlSelect1" required>
                            @foreach ($accounts as $account)
                            <option value={{ $account->id }} {{ $loop->iteration == 1 ? 'selected' : '' }}>{{ $account->bank->name." - ".$account->under_name }}</option>
                                
                            @endforeach

                        </select>
                    </div>

                    @endif
                    
                    <label class="form-label" for="amount">Jumlah</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="text" id="amount" wire:model='form.amount' class="form-control input-currency"
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
