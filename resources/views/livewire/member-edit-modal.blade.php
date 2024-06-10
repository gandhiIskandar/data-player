<div wire:ignore.self class="modal fade modal-animate" id="modalEditMember" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <x-partials.flash-message />
                <form wire:submit='updateMemberData'>

                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" wire:model.live="username" id="exampleInputEmail1"
                            required />
                        @if ($username_exist == 1)
                            <small id="emailHelp" class="form-text text-muted">Username tersedia</small>
                        @elseif($username_exist == 2)
                            <small id="emailHelp" class="form-text text-muted">Username belum tersedia </small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Nomor Handphone</label>
                        <input type="text" class="form-control" wire:model.live="phone_number"
                            id="exampleInputEmail1" required />
                        @if ($pn_exist == 1)
                            <small id="emailHelp" class="form-text text-muted">Nomor Handphone tersedia</small>
                        @elseif($pn_exist == 2)
                            <small id="emailHelp" class="form-text text-muted">Nomor Handphone belum tersedia
                            </small>
                        @endif
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
               $(document).ready(function(){



                $wire.on('showEditModalJS', (data) => {
                    $('#modalEditMember').modal('show');
                });


                $wire.on('confirmRemoveMemberJS', (data) => {
                 if(confirm('Yakin ingin hapus member' + data.member.username  + '?')){
                   $wire.dispatch('removeMember', [data.member.id]);
                 }
              
               })



               }); 


              



        </script>
    @endscript


@endpush
