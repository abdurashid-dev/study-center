<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                O'quvchi qo'shish
            </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
            <form action="{{route('students.store')}}" method="POST">
                @csrf
                @include('admin.students.form')
            </form>
        </div>
    </div>
</x-app-layout>
