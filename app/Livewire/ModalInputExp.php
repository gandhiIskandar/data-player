<?php

namespace App\Livewire;

use App\Livewire\Forms\ExpForm;
use App\Models\Account;
use App\Models\Expenditure;
use Carbon\Carbon;
use Livewire\Component;

class ModalInputExp extends Component
{
    public ExpForm $form;

    public $edit;

    public $expenditure;

    public $accounts; // untuk pilih rekening

    public function mount()
    {
        $this->accounts = Account::all();
    }

    public function render()
    {
        return view('livewire.modal-input-exp');
    }

    public function proceedExp()
    {
        if (! $this->edit) {
            $this->insertExp();
        } else {
            $this->updateExp();
        }
    }

    public function insertExp()
    {

        $expenditure = $this->form->create();

        $expenditure->date = Carbon::parse($expenditure->created_at)->translatedFormat('d F Y');

        $this->dispatch('expCreated', cashbook: $expenditure);
        $this->dispatch('reloadPowerGridExp');
    }

    #[\Livewire\Attributes\On('showModalNonEditStateExp')]
    public function showModalNonEditState()
    {
        $this->form->reset();

        $this->edit = false;

        $this->dispatch('showModalExpJS');
    }

    #[\Livewire\Attributes\On('removeConfirmCashBook')]
    public function removeConfirm($cashbook_id)
    {

        $this->dispatch('removeConfirmCashBookJS', cashbook_id: $cashbook_id);
    }

    //fungsi inisiasi data member untuk edit transaksi
    #[\Livewire\Attributes\On('showModalExpEdit')]
    public function showModalInputEditState($expenditure_id)
    {

        $this->edit = true; //aktifkan state edit

        $this->expenditure = Expenditure::find($expenditure_id);

        //inisiasi nilai form agar sesuai dengan data yang mau diedit

        $this->form->detail = $this->expenditure->detail;
        $this->form->amount = $this->expenditure->amount;
        $this->form->account_id = $this->expenditure->account_id;
        //end inisiasi

        $this->dispatch('showModalExpJS');
    }

    public function updateExp()
    {

        $this->form->update($this->expenditure);

        flash('Data pengeluaran berhasil diubah', 'alert-success');

        $this->dispatch('reloadPowerGridExp');

    }

    #[\Livewire\Attributes\On('confirmRemoveExp')]
    public function confirmDeleteExp($expenditure_id)
    {

        $this->dispatch('removeConfirmExpJS', expenditure_id: $expenditure_id);

    }

    #[\Livewire\Attributes\On('removeExp')]
    public function removeExp($expenditure_id)
    {

        $expenditure = Expenditure::where('id', $expenditure_id)->first();

        $expenditure->delete();

        $this->dispatch('reloadPowerGridExp');

    }
}
