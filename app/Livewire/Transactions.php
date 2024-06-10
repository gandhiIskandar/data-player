<?php

namespace App\Livewire;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class Transactions extends Component
{
    public $transactionsGroup;

    public $jenis = 1;

    public $xAxis = [];

    public $dataWd = [];

    public $dataDepo = [];

    public $jenisTabel = 1;

    //jenisTabel 1->Log
    //jenisTabel 2->Rekap

    //jenis 1 -> harian (default)
    //jenis 2 -> bulanan
    //jenis 3 -> Tahunan

    public function render()
    {

        // $this->dataGroupByDateAndType($this->jenis);

        // $transactions = Transaction::with(['member', 'type'])->orderBy('created_at', 'desc')->get();

        // $transactions->map(function ($transaction) {
        //     $transaction->date = Carbon::parse($transaction->created_at)->translatedFormat('d F Y');
        // });

        return view('livewire.transactions');
    }

    // public function dataGroupByDateAndType($jenis)
    // {

    //     if ($jenis == 1) {
    //         $this->transactionsGroup = Transaction::with('type')->selectRaw('DATE(created_at) as date, type_id, SUM(amount) as total')
    //             ->groupBy('date', 'type_id')
    //             ->orderBy('date', 'desc')
    //             ->get();

    //         $this->generateXAxisDaily($this->transactionsGroup);
    //     } elseif ($jenis == 3) {
    //         $this->transactionsGroup = Transaction::with('type')->selectRaw('YEAR(created_at) as date, type_id, SUM(amount) as total')
    //             ->groupBy('date', 'type_id')
    //             ->orderBy('date', 'desc')
    //             ->get();
    //     } else {
    //         $this->transactionsGroup = Transaction::with('type')->selectRaw('MONTH(created_at) as date, type_id, SUM(amount) as total')
    //             ->groupBy('date', 'type_id')
    //             ->orderBy('date', 'desc')
    //             ->get();

    //         $this->xAxis = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    //     }
    // }

    // public function generateXAxisDaily($transactions)
    // {
    //     $days = Carbon::now()->daysInMonth;

    //     for ($i = 1; $i <= $days; $i++) {
    //         $this->xAxis[] =  $i;

    //         $dataWd = $transactions->first(function ($transaction) use ($i) {

    //             $parsedDate = date_parse($transaction->date);

    //             $day = $parsedDate['day'];

    //             return $day == $i && $transaction->type_id == 1;
    //         });

    //         $dataDepo = $transactions->first(function ($transaction) use ($i) {
    //             $parsedDate = date_parse($transaction->date);

    //             $day = $parsedDate['day'];

    //             return $day == $i && $transaction->type_id == 2;
    //         });

    //         $this->dataWd[] =$dataWd->total??0;

    //         $this->dataDepo[] =$dataDepo->total??0 ;
    //     }

    // }

    // public function toRupiah($amount){

    //     return "Rp ".number_format($amount,0,',','.');
    // }
}
