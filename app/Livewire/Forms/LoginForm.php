<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required'])]
    public string $password = '';

    public function store()
    {

        if (Auth::attempt($this->validate())) {

            session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        throw ValidationException::withMessages([
            'email' => 'Email atau Password Anda Salah',
        ]);

    }
}
