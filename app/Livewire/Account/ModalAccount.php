<?php

namespace App\Livewire\Account;

use App\Models\Account;
use Livewire\Component;

class ModalAccount extends Component
{

    public $name;
    public $accounts;

    public function render()
    {
        $this->getAccounts();
        return view('livewire.account.modal-account');
    }
    public function deleteAccount($id){

       Account::destroy($id);

        flash("Berhasil Hapus Rekening",'alert-success');

    

    }
    public function insertAccount(){

        if($this->name != ''){

            Account::create([
                'name' => $this->name

            ]);

            flash("Berhasil Tambah Rekening",'alert-success');

        }else{
            flash("Gagal Tambah Rekening",'alert-danger');
        }

        $this->name = '';

    }

    public function getAccounts(){
        $this->accounts = Account::all();
    }
}
