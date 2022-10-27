<x-app-layout>
    @section('styles')
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                DTM
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('dtm.create')}}">
                <i class="fas fa-plus"></i>
                DTM qo'shish
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-search/>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                DTM nomi
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Guruh
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Sana
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Harakatlar
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($dtms as $dtm)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="py-3 px-6">
                                    {{(($dtms->currentpage()-1)*$dtms->perpage()+($loop->index+1)) }}
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('dtm.show', $dtm)}}"
                                       class="text-gray-900 dark:text-white">
                                        {{$dtm->name}}
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('dtm.show', $dtm)}}"
                                       class="text-gray-900 dark:text-white whitespace-nowrap">
                                        {{$dtm->group_id}} uzs
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('dtm.show', $dtm)}}"
                                       class="text-gray-900 dark:text-white whitespace-nowrap">
                                        {{$dtm->created_at->format('d-F-Y')}}
                                    </a>
                                </td>
                                <td class="py-4 px-8">
                                    <a href="{{route('dtm.show', $dtm)}}"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 whitespace-nowrap">
                                        <i class="fas fa-eye"></i> Ko'rish
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center py-3 px-6">
                                DTM natijalari topilmadi :(
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="my-3">˚†
                    {{$dtms->links()}}
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
    @endsection
</x-app-layout>
