<div class="row">
    <div class="col-md-12">


      
    </div>
   
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Rekening</h5>

                      
                            <button wire:click='$dispatch("showModalNonEditStateAccount")' type="button"
                                class="btn btn-primary" style="width: 200px;" type="button">Tambah Rekening</button>
                       
                    </div>

                </div>
                <div class="card-body">

                    <livewire:account.p-g-account-table />

                </div>
            </div>
        </div>
        <livewire:account.modal-account />
</div>
