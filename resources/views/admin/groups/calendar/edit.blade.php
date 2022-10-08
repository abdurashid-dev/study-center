<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
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
                <div class="flex justify-between">
                    <div style="width: 47%">
                        <x-jet-label for="group" value="Hafta kunlari"/>
                        <select style="margin: 4px 0 8px; padding: 8px" class="form-select appearance-none
                      block
                      w-full
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="Default select example">
                            <option selected>Hafta kunlari</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                        <x-jet-input-error for="address" class="mt-2"/>
                    </div>
                    <div style="width: 47%">
                        <x-jet-label for="address" value="Vaqt"/>
                        <input type="time"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none mt-1 mb-2">
                        <x-jet-input-error for="address" class="mt-2"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
