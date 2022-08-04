<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h4 class="font-semibold text-gray-800 leading-tight">
                {{$group->name}} davomatini tahrirlash
                ({{\Illuminate\Support\Carbon::parse($students[0]->attendance_date)->format('d-F-Y')}})
            </h4>
            @if($students->count() > 0)
                <button type="submit"
                        form="attendance-edit-form"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700">
                    <i class="fas fa-edit"></i>
                    Tahrirlash
                </button>
            @endif
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('attendance.update', $group->id)}}" id="attendance-edit-form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.attendances.edit-table')
            </form>
        </div>
    </div>
</x-app-layout>
