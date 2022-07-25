<div>
    @foreach($headers as $action)
    <div @class(['me-1' => $loop->last, 'btn-groups'])>
        @include('livewire-powergrid::components.actions-header', [
            'action' => $action
        ])
    </div>
    @endforeach
</div>
