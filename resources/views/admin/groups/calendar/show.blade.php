<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    @section('styles')
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Taqvim ({{$group->name}})
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('groups-times.index')}}">
                <i class="fas fa-arrow-left"></i>
                Orqaga
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="col" class="py-3 px-6">
                            Hafta kunlari
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Vaqtlari
                        </th>
                    </tr>
                    @forelse($group_times as $time)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            @if(!is_null($time->day))
                                <td class="py-3 px-6">
                                    {{$time->day}}
                                </td>
                                <td class="py-3 px-6">
                                    {{$time->time}}
                                </td>
                            @else
                                <td colspan="2" class="text-center">Ma'lumot topilmadi</td>
                            @endif
                        </tr>
                    @empty
                        no data found
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
