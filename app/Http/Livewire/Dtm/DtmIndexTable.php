<?php

namespace App\Http\Livewire\Dtm;

use App\Models\Dtm;
use Livewire\Component;
use Livewire\WithPagination;

class DtmIndexTable extends Component
{
    use WithPagination;

    public $search = '';
    public $orderBy = 'desc';
    public $pagination = 15;

    public function render()
    {
        $dtms = Dtm::search($this->search)->orderBy($this->orderBy)->paginate($this->pagination);
        return view('livewire.dtm.dtm-index-table', compact('dtms'));
    }
}
