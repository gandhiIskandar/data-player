<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.guest')] //mengatur master template/layout
class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->form->store();
    }

    public function render()
    {
    

        return view('livewire.login');
    }
}
