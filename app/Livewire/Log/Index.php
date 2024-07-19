<?php

namespace App\Livewire\Log;

use Livewire\Component;



use Livewire\Attributes\Title;


#[Title('Log')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.log.index');
    }
}
