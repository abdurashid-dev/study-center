<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$group->name}}
            </h2>
            <button type="submit"
                    form="attendance-form"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700">
                <i class="fas fa-edit"></i>
                    Saqlash
            </button>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('attendance.store', $group->id)}}" id="attendance-form" method="POST">
                @csrf
                @include('admin.attendances.create-table')
            </form>
        </div>
    </div>
</x-app-layout>
