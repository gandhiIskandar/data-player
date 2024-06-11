<?php

namespace App\Livewire;

use App\Models\Expenditure;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class PGExpenditureTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
     

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

    public function datasource(): Builder
    {

        $user = Auth::user();

        return Expenditure::query()->with(['user.role', 'account'])->whereHas('user', function($query) use($user) {
            $query->whereHas('role', function($query) use($user) {
                $query->where('role_id', $user->role_id);
            });
        });

        //ambil data pengeluaran berdasarkan role_id tetapi role_id ada di dalam user, jadi harus menggunakan whereHas
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('user_id', fn($expenditure) => $expenditure->user->name)
            ->add('amount', fn($expenditure) => $this->toRupiah($expenditure->amount) )
            ->add('detail')
            ->add('account_id', fn($expenditure)=> $expenditure->account->name)
            ->add('created_at_formatted', fn ($expenditure) => Carbon::parse($expenditure->created_at)->translatedFormat('d F Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('User', 'user_id'),
            Column::make('Jumlah', 'amount')
                ->sortable()
                ->searchable(),

            Column::make('Detail', 'detail')
                ->sortable()
                ->searchable(),

            Column::make('Bank', 'account_id'),
            Column::make('Tanggal', 'created_at_formatted', 'created_at')
                ->sortable(),

            // Column::make('Created at', 'created_at')
            //     ->sortable()
            //     ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert('.$rowId.')');
    // }

    public function actions(Expenditure $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('btn btn-primary')
                ->dispatch('edit', ['rowId' => $row->id]),

                Button::add('remove')
                ->slot('Hapus')
                ->id()
                ->class('btn btn-danger')
                ->dispatch('confirmRemoveExp', ['rowId' => $row->id])
        ];
    }

    public function toRupiah($amount)
    {

        return 'Rp '.number_format($amount, 0, ',', '.');
    }


    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}