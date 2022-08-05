<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Guruh qo'shish
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('groups.index')}}">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
            <form action="{{route('groups.store')}}" method="POST">
                @csrf
                @include('admin.groups.form')
            </form>
        </div>
    </div>
</x-app-layout>
