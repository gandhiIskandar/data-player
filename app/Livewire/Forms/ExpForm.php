<?php

namespace App\Livewire\Forms;

use App\Models\Expenditure;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ExpForm extends Form
{
    #[Rule(['required', 'numeric'])]
    public $amount = 0;

    #[Rule(['required'])]
    public $detail = '';

    #[Rule(['required'])]
    public $account_id = '';

    public function create()
    {
        if ($this->validate()) {

            $user = Auth::user();

            $expenditure = Expenditure::create([
                'user_id' => $user->id,
                'detail' => $this->detail,
                'amount' => $this->amount,
                'account_id' => $this->account_id,

            ]);
            $this->reset();

            flash('Berhasil Tambah Catatan Pengeluaran', 'alert-success');

            return $expenditure;
        }
    }

    public function update($expenditure)
    {

        //TODO nanti buatkan pengecekan bahwa yang berhak mengedit adalah user yang membuat kas itu sendiri

        if ($this->validate()) {
            //user id akan tetap sama dan tidak bisa diubah

            $expenditure->detail = $this->detail;
            $expenditure->amount = $this->amount;
            $expenditure->account_id = $this->account_id;

            $expenditure->save();

            flash('Berhasil Edit Catatan Pengeluaran', 'alert-success');
        }

    }
}
