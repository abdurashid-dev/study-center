<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
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

final class StudentTable extends PowerGridComponent
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
     * @return Builder<\App\Models\Student>
     */
    public function datasource(): Builder
    {
        return Student::query()
            ->join('student_groups', 'students.id', '=', 'student_groups.student_id')
            ->leftJoin('student_phone_numbers', function ($join) {
                $join->on('students.id', '=', DB::raw('student_phone_numbers.student_id AND student_phone_numbers.id = (SELECT MAX(id) FROM student_phone_numbers WHERE student_id = students.id)'));
            })
            ->leftJoin('groups', function ($join) {
                //the last group of the student
                $join->on('groups.id', '=', DB::raw('student_groups.group_id AND student_groups.id = (SELECT MAX(id) FROM student_groups WHERE student_id = students.id)'));
            })
            ->select('students.*', 'student_phone_numbers.phone_number', 'groups.name as group_name')
            ->where('groups.deleted', false)
            ->orderByRaw('created_at DESC');
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
            ->addColumn('full_name')
            ->addColumn('address')
            ->addColumn('group_name')
            ->addColumn('phone_number');
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
            Column::make('F.I.O', 'full_name')
                ->searchable()
                ->makeInputText()
                ->sortable(),
            Column::make('Manzil', 'address')
                ->searchable()
                ->makeInputText()
                ->sortable(),
            Column::make('Telefon', 'phone_number')
                ->clickToCopy(true, 'Copy name to clipboard')
                ->searchable()
                ->makeInputText()
                ->sortable(),
            Column::make('Guruh', 'group_name')
                ->sortable(),
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
     * PowerGrid Student Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::make('Show', "Ko'rish")
                ->class('bg-blue-500 cursor-pointer text-white px-3 py-2.5 rounded text-sm')
                ->target(false)
                ->route('students.show', ['student' => 'slug']),

            Button::make('edit', 'Tahrirlash')
                ->class('bg-green-600 cursor-pointer text-white px-3 py-2.5 rounded text-sm')
                ->target(false)
                ->route('students.edit', ['student' => 'slug']),

            Button::make('destroy', "O'chirish")
                ->class('bg-red-500 cursor-pointer text-white px-3 py-2 rounded text-sm delete-btn')
                ->route('students.destroy', ['student' => 'id'])
                ->target(false)
                ->method('delete')
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
     * PowerGrid Student Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($student) => $student->id === 1)
                ->hide(),
        ];
    }
    */
}
