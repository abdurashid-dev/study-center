<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            O'quvchi qo'shish
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
            <form action="{{route('students.store')}}" method="POST">
                @csrf
                @include('admin.students.create-form')
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.phone_btn').click(function (e) {
                    e.preventDefault();
                    let phone = $('.phone').val();
                    let phone_number = `<div>
                        <x-jet-label for="phone" value="Telefon raqam"/>
                        <x-jet-input class="phone" id="phone" type="phone" name="phones[]" :value="old('phone') ?? $student->phone"
                        autofocus/>
                        <x-jet-input-error for="phone" class="mt-2"/>
                        </div>`;
                    $('.phone_numbers').append(phone_number);
                });
            });
            $(document).ready(function () {
                $('.group-select').select2();
            });
        </script>
        <script src="{{asset('js/inputmask.js')}}"></script>
        <script>
            let selector = document.querySelectorAll(".phone");
            let im = new Inputmask("+\\9\\98(99)999-99-99", {'clearIncomplete': true});
            im.mask(selector);
        </script>
    @endsection
</x-app-layout>
