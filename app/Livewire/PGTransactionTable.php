<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use Illuminate\Support\Facades\Route;

final class PGTransactionTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): ?Builder
    {
        if (in_array(4, session('privileges')) && in_array(8, session('privileges')))
        {
            return Transaction::query()->with(['type', 'member', 'account'])->latest(); 

        } elseif (in_array(4, session('privileges'))) {
            return Transaction::query()->with(['type', 'member', 'account'])->where('type_id', 2)->latest(); // 2 adalah type_id dari deposit

        } elseif (in_array(8, session('privileges'))) {

            return Transaction::query()->with(['type', 'member', 'account'])->where('type_id', 1)->latest(); // 1 adalah type_id dari withdraw
        } else{
            return null;
        }
    }

    public function relationSearch(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('reloadTransaction')]
    public function reloadData()
    {

        //untuk refresh data
        $this->fillData();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()

            ->add('type_id', fn ($transaction) => $transaction->type->name)
            ->add('amount', fn ($transaction) => $this->toRupiah($transaction->amount))
            ->add('member_id', fn ($transaction) => $transaction->member->username ?? 'Member tidak ada')
            ->add('new', fn ($transaction) => $transaction->new == 1 ? 'Ya' : 'Tidak')
            ->add('account_id', fn ($transaction) => $transaction->account->name ?? 'null')
            ->add('created_at_formatted', fn ($transaction) => Carbon::parse($transaction->created_at)->translatedFormat('d F Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Username', 'member_id'),
            Column::make('Jenis Transaksi', 'type_id'),
            Column::make('Amount', 'amount')
                ->sortable()
                ->searchable(),

                Column::make('Rekening', 'account_id')
                ->sortable()
                ->searchable(),

            Column::make('Baru', 'new')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal', 'created_at_formatted', 'created_at')
                ->sortable(),

            // Column::make('Created at', 'created_at')
            //     ->sortable()
            //     ->searchable(),

         Column::action('Action')->hidden(isHidden: !privilegeEditTransaction()&&!privilegeRemoveTransaction()|| Route::currentRouteName() === 'dashboard', isForceHidden: true ),
        ];
    }

    public function filters(): array
    {
        return [

            Filter::datetimepicker('created_at_formatted', 'created_at')
                ->params([

                    'timezone' => 'Asia/Jakarta',

                ]),
        ];
    }

    public function actions(Transaction $row): array
    {

      

        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('btn btn-primary')
                ->dispatch('showModalTransactionEdit', ['transaction_id' => $row->id]),

            Button::add('remove')
                ->slot('Hapus')
                ->id()
                ->class('btn btn-danger')
                ->dispatch('deleteTransactionConfirm', ['transaction' => $row])
                ,
        ];
    }

    public function toRupiah($amount)
    {

        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
    
    public function actionRules($row): array
    {

      
       return [
            // Hide button edit for ID 1
            Rule::button('remove')
            ->when(
                fn() => !privilegeRemoveTransaction()) 
               
                ->hide(),


                Rule::button('edit')
                ->when(
                    fn() => !privilegeEditTransaction()) 
                    
                     ->hide(),

                     
        ];
    }
    
}
