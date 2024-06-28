<?php

namespace App\Livewire\Khususon;

use Livewire\Component;
use App\Models\Task;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;

#[Title('Dashboard')]

class Index extends Component
{

    public $totalUsersToday;

    public $totalTransaksi;

    public $tasks;

    public $finishedTask = [];

    public $transactions;


    
    public function render()
    {
      
        $this->getStat();
        $this->getTodoList();
        return view('livewire.khususon.index');
    }

    #[\Livewire\Attributes\On('reloadTransaction')]
    public function getStat()
    {

        $totals = DB::table('transactions')
            ->whereDate('created_at', Carbon::today())
            ->selectRaw('
            SUM(CASE WHEN type_id = 1 THEN amount ELSE 0 END) AS total_wd,
            SUM(CASE WHEN type_id = 2 AND new = 0 THEN amount ELSE 0 END) AS total_re_depo,
            SUM(CASE WHEN type_id = 2 AND new = 1 THEN amount ELSE 0 END) AS total_new_depo
        ')
            ->first();

        $this->totalTransaksi = $totals;

        $this->transactions = Transaction::with(['member', 'type'])->whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->get();

  
    }
    public function getTodoList()
    {

        $user = session('user_data');

        $this->tasks = Task::where('user_id', $user->id)->where('is_completed', 0)->get();
    }

    public function updateTask()
    {

        Task::whereIn('id', $this->finishedTask)->update(['is_completed' => 1]);

        $this->finishedTask = [];

    }


}
