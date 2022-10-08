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
                        <div class="flex justify-center">
                            <div class="timepicker relative form-floating mb-3 xl:w-96">
                                <input type="text"
                                       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                       placeholder="Select a date"/>
                                <label for="floatingInput" class="text-gray-700">Select a time</label>
                                <button tabindex="0" type="button" class="timepicker-toggle-button"
                                        data-mdb-toggle="timepicker">
                                    <i class="fas fa-clock timepicker-icon"></i>
                                </button>
                            </div>
                        </div>
                        <x-jet-input-error for="address" class="mt-2"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css"/>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    @endsection
</x-app-layout>
