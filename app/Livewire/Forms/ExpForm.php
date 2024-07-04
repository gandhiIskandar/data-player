<?php

namespace App\Livewire\Forms;

use App\Models\Expenditure;
use Exception;
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

    #[Rule(['required'])]
    public $currency_id = '';

    public function create()
    {


        $this->amount = changeToDot($this->amount);
    

            if ($this->validate()) {

                $user = Auth::user();

                $expenditure = Expenditure::create([
                    'user_id' => $user->id,
                    'detail' => $this->detail,
                    'amount' => $this->amount ,
                    'account_id' => $this->account_id,
                    'currency_id' => $this->currency_id,
                    'website_id' => session('website_id')

                ]);
                $this->reset();

                flash('Berhasil Tambah Catatan Pengeluaran', 'alert-success');

                // dd($expenditure);


                return $expenditure;
            }
       
    }

    public function update($expenditure)
    {

        //TODO nanti buatkan pengecekan bahwa yang berhak mengedit adalah user yang membuat kas itu sendiri

        if ($this->validate()) {
            //user id akan tetap sama dan tidak bisa diubah

            $expenditure->detail = $this->detail;
            $expenditure->amount = changeToDot($this->amount);
            $expenditure->account_id = $this->account_id;
            $expenditure->currency_id = $this->currency_id;

            $expenditure->save();

            flash('Berhasil Edit Catatan Pengeluaran', 'alert-success');
        }
    }
}
