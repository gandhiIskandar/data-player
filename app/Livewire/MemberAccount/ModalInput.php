<?php

namespace App\Livewire\MemberAccount;

use Livewire\Component;
use App\Models\Bank;
use App\Models\Member;
use App\Livewire\Forms\MemberAccountForm;
use App\Models\MemberAccount;

class ModalInput extends Component
{
    public $members;
    public $banks;

    public $memberAccount;

    public $edit;

    public MemberAccountForm $form;

    public function render()
    {
        $this->members = Member::all();
        $this->banks = Bank::all();

        return view('livewire.member-account.modal-input');
    }

    public function proccedMemberAccount(){
        if($this->edit =0 ){
            $this->insert();
        }else{
            $this->update();
        }
    }

    public function insert(){

        $this->form->create();

    }

    public function update(){
        $this->form->update($this->memberAccount);
    }

    #[\Livewire\Attributes\On('showModalMemberAccountEdit')]
    public function openEditModal($memberAccount_id){
        $this->edit =1;

        $this->memberAccount = MemberAccount::find($memberAccount_id);

        $this->form->under_name = $this->memberAccount->under_name;
        $this->form->bank_id = $this->memberAccount->bank_id;
        $this->form->number = $this->memberAccount->number;
        $this->form->member_id = $this->memberAccount->member_id;

        $this->dispatch('showModalMemberAccountJS');
    }

    #[\Livewire\Attributes\On('showModalMemberAccountNonEdit')]
    public function openCreateModal($memberAccount_id){
        $this->edit =0;

        $this->form->reset();
        $this->dispatch('showModalMemberAccountJS');
    }


    #[\Livewire\Attributes\On('deleteMemberAccountConfirm')]
    public function confirmDeleteMemberAccount($memberAccount)
    {

        $this->dispatch('deleteMemberAccountConfirmJS', memberAccount: $memberAccount);

    }

    #[\Livewire\Attributes\On('removeMemberAccount')]
    public function removeMemberAccount($memberAccount)
    {

        $memberAccount = (object) $memberAccount;

   

        $memberAccount->delete();

   

        $admin = auth()->user();

        

        insertLog($admin->name, request()->ip(), "Hapus Transaksi",$memberAccount->member_id, $memberAccount->bank->name , 0);

        

        flash("Berhasil Hapus Rekening Member","alert-success");

    }
}
