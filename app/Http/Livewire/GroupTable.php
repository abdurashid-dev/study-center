<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button,
    Column,
    Exportable,
    Footer,
    Header,
    PowerGrid,
    PowerGridComponent,
    PowerGridEloquent
};

final class GroupTable extends PowerGridComponent
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
     * @return Builder<\App\Models\Group>
     */
    public function datasource(): Builder
    {
        return Group::query()->where('deleted', false)->orderByRaw('created_at DESC');
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
     * |--------------------------------------------------------------------------
     */

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
            ->addColumn('status')
            ->addColumn('price');
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
                ->sortable(),

            Column::make('Guruh nomi', 'name')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('STATUS', 'status')
                ->toggleable(),
            //add number format function to column
            Column::make("To'lov summasi", 'price')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),
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
     * PowerGrid Group Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('attendance', "Davomat")
                ->class('bg-yellow-500 cursor-pointer text-white px-3 py-2.5 rounded text-sm')
                ->target(false) // false to open in new tab
                ->route('attendance.show', ['group' => 'slug']),

            Button::make('show', "Ko'rish")
                ->class('bg-blue-500 cursor-pointer text-white px-3 py-2.5 rounded text-sm')
                ->target(false) // false to open in new tab
                ->route('groups.show', ['group' => 'slug']),

            Button::make('edit', 'Tahrirlash')
                ->class('bg-green-600 cursor-pointer text-white px-3 py-2.5 rounded text-sm')
                ->target(false)
                ->route('groups.edit', ['group' => 'slug']),

            Button::make('destroy', "O'chirish")
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2 rounded text-sm delete-btn')
                ->target(false)
                //delete route
                ->route('groups.destroy', ['group' => 'id'])
                ->method('DELETE'),
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
     * PowerGrid Group Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($group) => $group->id === 1)
                ->hide(),
        ];
    }
    */

    /*-------------------------------------------*/
    /*|Toggle update|*/
    public function onUpdatedToggleable($id, $field, $value): void
    {
        Group::query()->find($id)->update([
            $field => $value,
        ]);
    }
    /*-------------------------------------------*/
    /*|onUpdate|*/
    public bool $showErrorBag = true;
    public $name = null;
    public $price = null;

    protected array $rules = [
        'name.*' => ['required', 'min:2', 'max:255'],
        'price.*' => ['required', 'numeric', 'min:1000'],
    ];

    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();
        Group::query()->find($id)->update([
            $field => $value,
        ]);
    }
}
