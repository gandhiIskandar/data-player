<?php

namespace App\Livewire;

use Livewire\Component;

class Expenditures extends Component
{
    public $jenisTabel;
    public function mount(){
        if(!privilegeViewExpenditure()){
            return abort(403,"Akses Dilarang");
        }
    }

    public function render()
    {
        return view('livewire.expenditures');
    }
}
