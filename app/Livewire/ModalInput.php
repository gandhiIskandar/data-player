<?php

namespace App\Livewire;

use App\Livewire\Forms\TransactionForm;
use App\Models\Account;
use App\Models\Bank;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Transaction;
use Livewire\Component;

class ModalInput extends Component
{
    public TransactionForm $form;

    public $exist = 0;

    public $edit = false;

    //exist 1 = user terdaftar
    //exist 2 = user belum terdaftar
    //exist 0 = default

    //nilai member akan diisi hanya jika edit false
    public $member;

    public $accounts; //list rekening admin
    public $banks;

    //nilai transaksi ini berguna untuk menyimpan data transaksi lama dan diisi ketika state edit aktif, kemudian akan melakukan save()
    public $transaction;

    public function render()
    {

        if (! $this->edit) {

            $this->checkUserExist();

        }
        $this->banks = Bank::all();

        $this->accounts = Account::with('bank')->get();

        return view('livewire.modal-input');
    }

    public function checkUserExist()
    {
        if ($this->form->username != '') {
            $this->member = Member::where('username', $this->form->username)->first();

            if ($this->member != null) {
                $this->exist = 1;
            } else {
                $this->exist = 2;
            }
        } else {
            $this->exist = 0;
        }
    }

    public function procedTransaction()
    {

        //hilankan titik pada angka

        $this->form->amount = str_replace('.','',$this->form->amount);

        if (! $this->edit) {
            $this->insertTransaction();
        } else {
            $this->updateTransaction();
        }
    }

    //fungsi inisiasi data member untuk edit transaksi
    #[\Livewire\Attributes\On('showModalTransactionEdit')]
    public function showModalInputEditState($transaction_id)
    {

        $this->edit = true; //aktifkan state edit

        $this->transaction = Transaction::with(['member'])->find($transaction_id);

       // dd($this->transaction);

        $this->exist = 1; //set 1 karena member sudah ada

        //inisiasi nilai form agar sesuai dengan data yang mau diedit

        $this->form->username = $this->transaction->member->username ?? 'Member Tidak Ada';
        $this->form->amount = $this->transaction->amount;
        $this->form->type = $this->transaction->type_id;
        //end inisiasi

        $this->dispatch('showModalTransactionJS');
    }

    public function updateTransaction()
    {

        $this->form->updateTransaction($this->transaction);

        flash('Data transaksi berhasil diubah', 'alert-success');

        $this->dispatch('reloadTransaction');

    }

    #[\Livewire\Attributes\On('showModalNonEditState')]
    public function showModalNonEditState()
    {
        $this->form->reset();

        $this->edit = false;

        $this->dispatch('showModalTransactionJS');
    }

    #[\Livewire\Attributes\On('deleteTransactionConfirm')]
    public function confirmDeleteTransaction($transaction)
    {

        $this->dispatch('deleteTransactionConfirmJS', transaction: $transaction);

    }

    #[\Livewire\Attributes\On('removeTransaction')]
    public function removeTransaction($transaction)
    {

        $transaction = (object) $transaction;

        $transaction = Transaction::where('id', $transaction->id)->with(['member'])->first();

        $transaction->delete();

        $this->reduceSumMember($transaction->member, $transaction->type_id, $transaction->amount);

        $admin = Auth::user();

        $formattedAmount = toRupiah($transaction->amount, true);

        insertLog($admin->name, request()->ip(), "Hapus Transaksi",$transaction->member_id, $transaction->type_id == 1 ? "Hapus Withdraw $formattedAmount" : "Hapus Deposit $formattedAmount" , 0);

        

        $this->dispatch('reloadTransaction');

    }

    public function reduceSumMember($member, $type_id, $amount)
    {

        //type 1 = wd
        //type 2 = depo

        switch ($type_id) {
            case 1:
                $member->total_wd -= $amount;
                break;
            case 2:
                $member->total_depo -= $amount;
                break;
        }

        $member->save();

    }

    public function insertTransaction()
    {
        if ($this->exist == 1) {
            $transaction = $this->form->create($this->member->id);
        } else {
            $transaction = $this->form->create();
        }

        // $this->dispatch('reloadPowerGridTransaction');
        $this->dispatch('reloadTransaction');
    }
}
