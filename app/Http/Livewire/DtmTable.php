<?php

namespace App\Http\Livewire;

use App\Models\Dtm;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent
};
use PowerComponents\LivewirePowerGrid\Rules\{RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class DtmTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
//        $this->showCheckBox();
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

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Dtm>
     */
    public function datasource(): Builder
    {
        return Dtm::query()->with('group')->orderByDesc('created_at');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('group.name')
//            ->addColumn('description', fn(Dtm $dtm) => \Str::limit($dtm->description, 20))
            ->addColumn('count_tests')
            ->addColumn('created_at_formatted', fn(Dtm $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->makeInputRange(),

            Column::make('DTM NOMI', 'name')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('GURUH', 'group.name'),

            Column::make('TESTLAR SONI', 'count_tests')
                ->sortable()
                ->editOnClick()
                ->makeInputRange(),

            Column::make('TEST OLINGAN SANA', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Dtm Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('show', "Ko'rish")
                ->class('bg-blue-500 cursor-pointer text-white px-3 py-2.5 rounded text-sm')
                ->target(false)
                ->route('dtm.show', ['dtm' => 'slug']),
            Button::make('edit', "Tahrirlash")
                ->class('bg-green-500 cursor-pointer text-white px-3 py-2.5 rounded text-sm')
                ->target(false)
                ->route('dtm.edit', ['dtm' => 'slug']),
            Button::make('edit', "O'chirish")
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2.5 rounded text-sm')
                ->target(false)
                ->route('dtm.destroy', ['dtm' => 'slug']),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Dtm Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($dtm) => $dtm->id === 1)
                ->hide(),
        ];
    }
    */
    /*-------------------------------------------*/
    /*|Toggle update|*/
    public function onUpdatedToggleable($id, $field, $value): void
    {
        Dtm::query()->find($id)->update([
            $field => $value,
        ]);
    }
    /*-------------------------------------------*/
    /*|onUpdate|*/
    public bool $showErrorBag = true;
    public $name = null;
    public $count_tests = null;

    protected array $rules = [
        'name.*' => ['required', 'min:2', 'max:255'],
        'count_tests.*' => ['required', 'min:2', 'max:255'],
    ];

    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();
        Dtm::query()->find($id)->update([
            $field => $value,
        ]);
    }
}
