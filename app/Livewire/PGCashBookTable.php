<?php

namespace App\Livewire;

use App\Models\CashBook;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class PGCashBookTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

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
        return CashBook::query()->with(['type', 'user']);
    }

    public function relationSearch(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('reloadPowerGridCashBooks')]
    public function reloadData()
    {

        //untuk refresh data
        $this->fillData();

    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('type_id', fn ($cashBook) => $cashBook->type->name)
            ->add('amount', fn ($cashBook) => $this->toRupiah($cashBook->amount))
            ->add('detail')
            ->add('user_id', fn ($cashBook) => $cashBook->user->name)
            ->add('created_at_formatted', fn ($cashBook) => Carbon::parse($cashBook->created_at)->translatedFormat('d F Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Type', 'type_id'),
            Column::make('Jumlah', 'amount')
                ->sortable()
                ->searchable(),

            Column::make('Detail', 'detail')
                ->sortable()
                ->searchable(),

            Column::make('User', 'user_id'),
            Column::make('Tanggal', 'created_at_formatted', 'created_at')
                ->sortable(),

            // Column::make('Created at', 'created_at')
            //     ->sortable()
            //     ->searchable(),

            Column::action('Action'),
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

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(CashBook $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('btn btn-primary')
                ->dispatch('showModalCashBookEdit', ['cashbook_id' => $row->id]),

            Button::add('remove')
                ->slot('Hapus')
                ->id()
                ->class('btn btn-danger')
                ->dispatch('removeConfirmCashBook', ['cashbook_id' => $row->id]),
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
