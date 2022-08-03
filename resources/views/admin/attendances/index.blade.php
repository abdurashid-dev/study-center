<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Davomat
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 flex justify-evenly flex-wrap">
                @forelse($groups as $group)
                    <div class="w-48 mx-auto mt-2">
                        <a href="{{route('attendance.show', $group->slug)}}"
                           class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$group->name}}</h5>
                        </a>
                    </div>
                @empty
                    <h4>Guruhlar topilmadi :(</h4>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
