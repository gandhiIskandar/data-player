<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\User;

class LoginForm extends Form
{
    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required'])]
    public string $password = '';

    public function store()
    {

        if (Auth::attempt($this->validate())) {

            $user = Auth::user();

            $user = User::with(['privileges','role'])->find($user->id);
 $privileges = $user->privileges->pluck('id')->toArray();
           

            session()->regenerate();
            session()->put('user_data', $user);
            session()->put('privileges', $privileges);

            switch ($user->role_id) {
                case 1: // customer service
                    return redirect()->intended('/dashboard');
                    break;
                case 2: // marketing
                    return redirect()->intended('/expenditures');
                    break;
                case 3: // admin
                    return redirect()->intended('/expenditures');
                    break;
                case 4: // super admin
                    return redirect()->intended('/dashboard');
                    break;
            }
        }
        throw ValidationException::withMessages([
            'email' => 'Email atau Password Anda Salah',
        ]);
    }
}
