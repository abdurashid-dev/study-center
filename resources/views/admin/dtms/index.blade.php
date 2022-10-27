<x-app-layout>
    @section('styles')
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                DTM
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('dtm.create')}}">
                <i class="fas fa-plus"></i>
                Yangi DTM
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
        @include('links.sweetalert')
    @endsection
</x-app-layout>
