<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials.dashboard-cards')

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 mt-5">
                <livewire:livewire-line-chart
                    :line-chart-model="$line"
                />
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endsection
</x-app-layout>
