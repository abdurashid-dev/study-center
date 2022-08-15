<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    @section('styles')
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Davomat
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 flex justify-evenly flex-wrap p-5">
                @forelse($groups as $group)
                    <div
                        class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 p-6 my-2">
                        <div class="flex flex-col items-center pb-10">
                            <h5 class="mb-1 mt-2 text-xl font-medium text-gray-900 dark:text-white">{{$group->name}}</h5>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{route('attendance.show', $group->slug)}}"
                                   class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ko'rish</a>
                                <a href="{{route('attendance.create', $group->slug)}}"
                                   class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Davomat
                                    qo'shish</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>Guruhlar topilmadi :(</h4>
                @endforelse
            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
    @endsection
</x-app-layout>
