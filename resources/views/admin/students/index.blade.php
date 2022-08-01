<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    @section('styles')
        @include('links.toastr-css')
    @endsection
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                O'quvchilar
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('students.create')}}">
                <i class="fas fa-plus"></i>
                Yangi O'quvchi
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <livewire:student-table/>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
        @include('links.sweetalert')
        <script>
            $(document).ready(function () {
                $('.phone_btn').click(function (e) {
                    alert('Hello');
                    e.preventDefault();
                    let phone = $('.phone').val();
                    let phone_number = `<div>
                            <x-jet-label for="phone" value="Telefon raqam"/>
                            <x-jet-input class="phone" id="phone" type="phone" name="phone" :value="old('phone') ?? $student->phone" required
                            autofocus/>
                            <x-jet-input-error for="phone" class="mt-2"/>
                            </div>`;
                    $('.phone_numbers').append(phone_number);
                });
            });
        </script>
    @endsection
</x-app-layout>
