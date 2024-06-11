@push('css')

<style>

    /* berguna untuk membatasi panjang text detail agar tidak terlalu lebar */

    #table_base_default td div{
        
        max-width: 200px !important;
        overflow-wrap: break-word;
        text-wrap: wrap;
    }

</style>

@endpush

<div>

    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Log Transaksi</h5>
                    <button wire:click='$dispatch("showModalNonEditStateCashBook")' type="button" class="btn btn-primary"
                        style="width: 200px;" type="button">Tambah Catatan Kas</button>
                </div>
            
            </div>
            <div class="card-body">

                <livewire:p-g-expenditure-table/>
              
            </div>
        </div>
    </div>

</div>


@push('script')

@script


<script>

$(document).ready(function() {
        // $('#table_base_default').css({
        //     'color': 'red',
        //     'font-size': '20px'
        // });
    });

</script>

@endscript
@endpush
