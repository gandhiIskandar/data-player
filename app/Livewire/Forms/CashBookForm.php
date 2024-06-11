<?php

namespace App\Livewire\Forms;

use App\Models\CashBook;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CashBookForm extends Form
{
    #[Rule(['required', 'numeric'])]
    public $type_id = '';

    #[Rule(['required', 'numeric'])]
    public $amount = 0;

    #[Rule(['required'])]
    public $detail = '';

    public function create()
    {
        if ($this->validate()) {

            $cashbook = CashBook::create([
                'user_id' => 1, //untuk dummy data saja
                'detail' => $this->detail,
                'amount' => $this->amount,
                'type_id' => $this->type_id,
            ]);
            $this->reset();

            flash('Berhasil Tambah Catatan Kas', 'alert-success');

            return $cashbook;
        }

    }

    public function update($cashBook)
    {

        //TODO nanti buatkan pengecekan bahwa yang berhak mengedit adalah user yang membuat kas itu sendiri

        if ($this->validate()) {
            //user id akan tetap sama dan tidak bisa diubah

            $cashBook->detail = $this->detail;
            $cashBook->amount = $this->amount;
            $cashBook->type_id = $this->type_id;

            $cashBook->save();
        }

    }
}
