<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\User;

class AccountSetting extends Component
{

    public $user;

    #[Rule(['required'])]
    public $email;

    #[Rule(['required'])]
    public $name;

    public $role;


    public function mount(){

        $user = Auth::user();

        $this->user = User::with('role')->find($user->id);

        

        $this->email = $this->user->email;
        $this->name = $this->user->name;
        $this->role = $this->user->role->name;

    }

    public function render()
    {
        return view('livewire.account-setting');
    }

    public function updateDataUser(){

        if($this->validate()){
            $this->user->email = $this->email;
            $this->user->name = $this->name;

            $this->user->save();

            flash('Update Data Berhasil', 'alert-success');

        }

    }
}
