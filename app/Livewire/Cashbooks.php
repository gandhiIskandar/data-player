<?php

namespace App\Livewire;

use Livewire\Component;

class Cashbooks extends Component
{
    public $jenisTabel = 1;

    public function render()
    {
        return view('livewire.cashbooks');
    }
}
