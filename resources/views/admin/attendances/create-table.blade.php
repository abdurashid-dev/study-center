<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                #
            </th>

            <th scope="col" class="py-3 px-6 text-center">
                F.I.O
            </th>
            <th scope="col" class="py-3 px-6 text-center">
                Status
            </th>
            <th scope="col" class="py-3 px-6 text-center whitespace-nowrap">
                Izoh <small>(majburiy emas)</small>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($students as $student)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$loop->iteration}}
                </td>
                <td class="py-4 px-6">{{$student->full_name}}</td>
                <td class="py-4 px-6">
                    <div class="flex flex-wrap sm:justify-between">
                        <div class="flex items-center mr-4">
                            <input id="{{$student->id}}1" type="radio" value="0"
                                   name="status[{{$student->id}}]">
                            <label for="{{$student->id}}1"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelmadi</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input checked="checked" id="{{$student->id}}2" type="radio" value="1"
                                   name="status[{{$student->id}}]">
                            <label for="{{$student->id}}2"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Keldi</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input type="radio" value="2" id="{{$student->id}}3"
                                   name="status[{{$student->id}}]">
                            <label for="{{$student->id}}3"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sababli
                                kelmadi</label>
                        </div>
                    </div>
                </td>
                <td class="py-4 px-6">
                    <x-jet-input type="text" name="comment[{{$student->id}}]"
                                 class="block w-full border border-gray-300 dark:border-gray-700 rounded-lg py-2 px-4 text-gray-700 dark:text-gray-400 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                 placeholder="Izoh"></x-jet-input>
                </td>
            </tr>
        @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td colspan="3" class="py-4 px-6 text-center">O'quvchilar topilmadi :(</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
