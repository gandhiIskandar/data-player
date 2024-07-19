<?php

namespace App\Livewire\Log;

use Livewire\Component;
use App\Models\Log;

class Table extends Component
{

    public $logs;

    public function render()
    {

        $this->logs = Log::with(['user','member'])->where('website_id',session('website_id'))->latest()->get();

        $this->logs->map(function($data){
            $data->date = $data->created_at->translatedFormat('d F Y H:i');
        });

        return view('livewire.log.table');
    }
}
