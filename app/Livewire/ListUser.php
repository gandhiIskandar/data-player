<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Users')]
class ListUser extends Component
{

   

    public function render()
    {

   

        return view('livewire.list-user');
    }
}
