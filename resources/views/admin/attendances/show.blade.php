<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$group->name}} o'quvchilarining davomatlari
            </h2>
            @if($group->students->count() > 0)
                <a href="{{route('attendance.edit', $group->id)}}"
                   class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                   title="Oxirgi davomatni tahrirlash">
                    <i class="fas fa-edit"></i>
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @include('admin.attendances.hint')
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                F.I.O
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Oxirgi 5 kunlik davomati
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Harakatlar
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($group->students as $student)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="py-4 px-6">{{$student->student->full_name}}</td>
                                <td class="py-4 px-6 flex gap-4 text-white"
                                    style="flex-direction: row-reverse; justify-content: start">
                                    @foreach($group->getAttendanceStatusAttribute($group->id, $student->student->id) as $status)
                                        {!! $group->getAttendanceDivAttribute($status->status, \Illuminate\Support\Carbon::parse($status->date)->format('d-F-Y')) !!}
                                    @endforeach
                                </td>
                                <td class="py-4 px-6">Ko'rish</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
