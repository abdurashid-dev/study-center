<x-app-layout>
    @section('styles')
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$group->name}}
            </h2>
            <div class="flex gap-1">
                <a href="{{route('attendance.index')}}"
                   class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                   title="Orqaga">
                    <i class="fas fa-arrow-left"></i>
                </a>
                @if($group->students->count() > 0)
                    <a href="{{route('attendance.edit', $group->id)}}"
                       class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 dark:focus:bg-green-700"
                       title="Oxirgi davomatni tahrirlash">
                        <i class="fas fa-edit"></i>
                    </a>
                @endif
            </div>
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
                        @forelse($group->students as $student)
                            @if(!is_null($student->student))
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6">{{$student->student->full_name}}</td>
                                    <td class="py-4 px-6 flex gap-4 text-white"
                                        style="flex-direction: row-reverse; justify-content: start">
                                        @foreach($group->getAttendanceStatusAttribute($group->id, $student->student->id) as $status)
                                            {!! $group->getAttendanceDivAttribute($status->status, \Illuminate\Support\Carbon::parse($status->date)->format('d-F-Y')) !!}
                                        @endforeach
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="{{route('students.show', $student->student->slug)}}"
                                           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ko'rish</a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="text-center py-4 px-6" colspan="3">
                                        <h1 class="text-lg">
                                            O'quvchilar mavjud emas.
                                        </h1>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="py-4 px-6" colspan="3">
                                    <div class="flex items-center justify-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm leading-5 text-gray-500">
                                                O'quvchilar mavjud emas.
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
    @endsection
</x-app-layout>
