<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    @section('styles')
        <style>
            .time-rows {
                width: 48%;
            }

            @media screen and (max-width: 850px) {
                .time-rows {
                    width: 44%;
                }
            }
        </style>
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
                <form action="{{route('groups-times.update', $group->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div id="baseDiv">
                        <div class="flex justify-between items-center">
                            <div class="time-rows">
                                <x-jet-label for="group" value="Hafta kunlari"/>
                                <select style="margin: 4px 0 8px; padding: 8px" name="days[]" class="form-select appearance-none
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
                                    <option value="" selected>Hafta kunlari</option>
                                    <option value="Dushanba">Dushanba</option>
                                    <option value="Seshanba">Seshanba</option>
                                    <option value="Chorshanba">Chorshanba</option>
                                    <option value="Payshanba">Payshanba</option>
                                    <option value="Juma">Juma</option>
                                    <option value="Shanba">Shanba</option>
                                    <option value="Yakshanba">Yakshanba</option>
                                </select>
                                <x-jet-input-error for="days.*" class="mt-2"/>
                            </div>
                            <div class="time-rows">
                                <x-jet-label for="address" value="Vaqt"/>
                                <input name="times[]" type="time"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none mt-1 mb-2">
                                <x-jet-input-error for="times.*" class="mt-2"/>
                            </div>
                            <button type="button" id="remove"
                                    class="block mt-4 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 dark:focus:bg-red-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div id="timeParent">
                        <div class="flex justify-between">
                            <div style="width: 49%">
                                <x-jet-label for="group" value="Hafta kunlari"/>
                                <select style="margin: 4px 0 8px; padding: 8px" name="days[]" class="form-select appearance-none
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
                                    <option value="" selected>Hafta kunlari</option>
                                    <option value="Dushanba">Dushanba</option>
                                    <option value="Seshanba">Seshanba</option>
                                    <option value="Chorshanba">Chorshanba</option>
                                    <option value="Payshanba">Payshanba</option>
                                    <option value="Juma">Juma</option>
                                    <option value="Shanba">Shanba</option>
                                    <option value="Yakshanba">Yakshanba</option>
                                </select>
                                <x-jet-input-error for="days.*" class="mt-2"/>
                            </div>
                            <div style="width: 49%">
                                <x-jet-label for="address" value="Vaqt"/>
                                <input name="times[]" type="time"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-none mt-1 mb-2">
                                <x-jet-input-error for="times.*" class="mt-2"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-2">
                        <div class="flex justify-between">
                            <button type="button" id="addNew"
                                    class="block mr-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 dark:focus:bg-green-700">
                                <i class="fas fa-plus"></i>
                                Qo'shish
                            </button>
                            <button type="submit"
                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700">
                                <i class="fas fa-save"></i>
                                Saqlash
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            $('#addNew').click(function () {
                $baseDiv = $('#baseDiv').html();
                $('#timeParent').append($baseDiv);
            })
        </script>
    @endsection
</x-app-layout>
