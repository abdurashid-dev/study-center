<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    @section('styles')
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Taqvim
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('groups.index')}}">
                <i class="fas fa-arrow-left"></i>
                Orqaga
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h3 class="text-center">Guruhlar</h3>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Guruh
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Ko'rish
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Tahrirlash
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($groups as $group)
                            <td class="py-3 px-6">
                                {{(($groups->currentpage()-1)*$groups->perpage()+($loop->index+1)) }}
                            </td>
                            <td class="py-3 px-6">
                                {{$group->name}}
                            </td>
                            <td class="py-6 px-6">
                                <a
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                                    href="{{route('groups-times.show', $group->slug)}}">
                                    Ko'rish
                                </a>
                            </td>
                            <td class="py-3 px-6">
                                <a
                                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 dark:focus:bg-green-700"
                                    href="{{route('groups-times.show', $group->slug)}}">
                                    Tahrirlash
                                </a>
                            </td>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="my-3">
                    {{$groups->links()}}
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
        @include('links.sweetalert')
    @endsection
</x-app-layout>
