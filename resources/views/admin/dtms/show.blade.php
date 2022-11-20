<x-app-layout>
    @section('styles')
        @include('links.toastr-css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
    @endsection
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                DTM ({{$dtm->name}})
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('dtm.index')}}">
                <i class="fas fa-arrow-left"></i>
                Orqaga
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row d-flex justify-end">
                                    <div class="col-sm-12 col-md-6">
                                        <a href="{{route('dtm.student-dtm-create', $dtm->slug)}}"
                                           class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700 btn btn-sm mt-1">
                                            <i class="fas fa-plus"></i> Qo'shish
                                        </a>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <a type="button"
                                           class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700 btn btn-sm mt-1"
                                           data-bs-toggle="modal"
                                           data-bs-target="#infoModal">
                                            <i class="fas fa-info-circle"></i> Ma'lumot
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.dtms.dtm-info')
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                F.I.O
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Guruh
                            </th>
                            <th scope="col" class="py-3 px-6">
                                To'gri javoblar soni
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Harakatlar
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="py-3 px-6">
                                    {{(($students->currentpage()-1)*$students->perpage()+($loop->index+1)) }}
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $student->student->slug)}}"
                                       class="text-gray-900 dark:text-white">
                                        {{$student->student->full_name}}
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $student->student->slug)}}"
                                       class="text-gray-900 dark:text-white">
                                        {{$dtm->getGroupName($dtm->group_id)}}
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $student->student->slug)}}"
                                       class="text-gray-900 dark:text-white">
                                        {{$student->count_answers}}
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $student->student->slug)}}"
                                       aria-current="page"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700">
                                        <i class="fas fa-eye"></i>
                                        Ko'rish
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center py-3 px-6">
                                O'quvchilar topilmadi :(
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="my-3">
                    {{$students->links()}}
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
    @endsection
</x-app-layout>
