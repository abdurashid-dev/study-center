<div>
    @push('styles')
        @include('links.toastr-css')
    @endpush
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h3 class="text-center p-2">Qarzdor o'quvchilar</h3>
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
                                Telefon raqam
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Guruh
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Qarzi
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
                                    <a href="{{route('students.show', $student->slug)}}"
                                       class="text-gray-900 dark:text-white">
                                        {{$student->full_name}}
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    @foreach($student->phones as $phone)
                                        <a href="tel:{{$phone->phone_number}}" class="whitespace-nowrap">
                                            {{$phone->phone_number}}
                                        </a><br>
                                    @endforeach
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $student->slug)}}"
                                       class="text-gray-900 dark:text-white whitespace-nowrap">
                                        @forelse($student->groups as $group)
                                            {{$group->group->name}}<br>
                                        @empty
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900 whitespace-nowrap">
                                                Guruh topilmadi :(
                                            </span>
                                        @endforelse
                                    </a>
                                </td>
                                <td class="py-3 px-6 whitespace-nowrap">
                                    {{number_format($student->balance, 0, '', ' ')}} UZS
                                </td>
                                <td class="py-3 px-6">
                                    <button
                                        class="bg-gradient-to-tl from-blue-600 to-blue-300 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        <a href="{{route('students.show', $student->slug)}}">
                                            Ko'rish
                                        </a>
                                    </button>
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
    @push('scripts')
        @include('links.toastr-js')
        @include('links.sweetalert')
    @endpush
</div>
