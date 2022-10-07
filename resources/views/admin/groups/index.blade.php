<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    @section('styles')
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Guruhlar
            </h2>
            <div class="flex justify-between">
                <a
                    class="block mr-1 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 dark:focus:bg-green-700"
                    href="{{route('groups.create')}}">
                    <i class="far fa-calendar-alt"></i>
                    Taqvim
                </a>
                <a
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                    href="{{route('groups.create')}}">
                    <i class="fas fa-plus"></i>
                    Yangi Guruh
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <livewire:group-table/>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
        @include('links.sweetalert')
    @endsection
</x-app-layout>
