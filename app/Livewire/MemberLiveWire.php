<?php

namespace App\Livewire;

use Livewire\Component;

class MemberLiveWire extends Component
{

    public function mount(){
        if(!privilegeViewMember()){
            return abort(403,"Akses Dilarang");
        }
    }

    public function render()
    {
        return view('livewire.member-livewire');
    }
}
