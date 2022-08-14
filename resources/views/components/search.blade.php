<div class="row d-flex align-items-center justify-content-center">
    <div class="row col-md-6 col-sm-12">
        <input class="form-control " type="search" placeholder="{{__('words.search')}}" aria-label="{{__('words.search')}}"
               wire:model.debounce.500ms="search">
    </div>
    <div class="row col-md-6 col-sm-12">
        <div class="col-4 p-2">
            <select class="form-select" id="orderby" wire:model="column">
                <option value="id">ID</option>
                {{$slot}}
            </select>
        </div>
        <div class="col-4 p-2">
            <select class="form-select" id="order" wire:model="asc">
                <option value="asc">{{__('words.asc')}}</option>
                <option value="desc">{{__('words.desc')}}</option>
            </select>
        </div>
        <div class="col-4 p-2">
            <select class="form-select" id="pagination" wire:model="perPage">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
</div>
