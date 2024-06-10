<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use App\Models\Member;

class MemberEditModal extends Component
{
   

    public $member;

    #[Rule(['required'])]
    public $username = "";

    #[Rule(['required'])]
    public $phone_number = "";


    public $username_exist = 0;
    public $pn_exist = 0;
    public function render()
    {

        $this->checkUsername();
        $this->checkPhoneNumber();

        return view('livewire.member-edit-modal');
    }
    public function checkUsername()
    {
        if ($this->username != "") {
            $exists = Member::where('username', $this->username)->whereNotIn('id', [$this->member->id])->first();

            if (!$exists) {
                $this->username_exist = 2;
                if ($this->username == $this->member->username) {
                    $this->username_exist = 0; //jika data sama maka akan default
                }
            } else {

                $this->username_exist = 1;
            }
        } else {
            $this->username_exist = 0;
        }
    }
    #[On('confirmRemoveMember')]
    public function deleteConfirmation($member){

        $member = (object) $member;


        $this->dispatch('confirmRemoveMemberJS', member: $member);

    }

    public function checkPhoneNumber()
    {
        if ($this->phone_number != "") {
            $exists = Member::where('phone_number', $this->phone_number)->whereNotIn('id', [$this->member->id])->first();

            if (!$exists) {
                $this->pn_exist = 2;

                if ($this->phone_number == $this->member->phone_number) {
                    $this->pn_exist = 0; //jika data sama maka akan default
                }
            } else {
                $this->pn_exist = 1;
            }
        } else {
            $this->pn_exist = 0;
        }
    }

    #[On('showEditModal')]
    public function showEdit($member_id)
    {

       

        

        $this->member = Member::find($member_id);

        $this->username = $this->member->username;
        $this->phone_number = $this->member->phone_number;




        $this->dispatch('showEditModalJS');
    }

    public function updateMemberData(){
        if($this->pn_exist == 1 || $this->username_exist == 1  ){
            flash('Username atau Nomor Handphone telah terdaftar', 'alert-danger');
            
        } elseif($this->pn_exist == 0 && $this->username_exist == 0){
            flash('Data tidak diupdate, karena tidak ada perubahan data', 'alert-info');

        } elseif($this->pn_exist != 1 || $this->username_exist != 1  ){
            if($this->validate()){
                $this->member->username = $this->username;
                $this->member->phone_number = $this->phone_number;
                $this->member->save();
                flash('Data member berhasil diubah', 'alert-success');

                $this->dispatch('reloadPowerGridMember');

            }else{
                flash('Data tidak boleh kosong', 'alert-danger');
            }
           
        }
    }

}

