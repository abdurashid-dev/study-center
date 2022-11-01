<x-app-layout>
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                DTM qo'shish
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('dtm.index')}}">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('dtm.student-dtm-store', [$dtm->slug, $dtm->group_id])}}" method="POST">
                @csrf
                <div>
                    <x-jet-label for="student_id" value="O'quvchi ismi"/>
                    <select
                        class="group-select block py-3 px-4 w-full"
                        name="student_id" id="student_id">
                        <option value="">O'quvchini tanlang</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">
                                {{ $student->full_name }}
                            </option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="student_id" class="mt-2"/>
                </div>
                <div>
                    <x-jet-label for="count_answers" value="Testlar soni"/>
                    <x-jet-input id="count_answers" type="number" name="count_answers"
                                 :value="old('count_answers')"
                                 required
                                 autofocus/>
                    <x-jet-input-error for="count_answers" class="mt-2"/>
                </div>
                <div class="mb-3">
                    <x-jet-label for="groups" value="Guruh"/>
                    <x-jet-input id="name" type="text" name="name" :value="$dtm->getGroupName($dtm->group_id)" required
                                 autofocus disabled/>
                    <x-jet-input-error for="group_id" class="mt-2"/>
                </div>
                <div class="flex justify-end">
                    <button
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700 mt-2"
                        type="submit">
                        Saqlash
                    </button>
                </div>

            </form>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.group-select').select2();
            });
        </script>
    @endsection
</x-app-layout>
