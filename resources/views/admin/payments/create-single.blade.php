<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                To'lov qilish
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('payment.index')}}">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
            <form action="{{route('payment.store')}}" method="POST">
                @csrf
                <div>
                    <input type="hidden" value="{{$student->id}}" name="student_id">
                    <x-jet-label for="student_id" value="O'quvchi"/>
                    <x-jet-input id="student_id" type="text" :value="$student->full_name" disabled/>
                    <x-jet-input-error for="student_id" class="mt-2"/>
                </div>
                <div>
                    <x-jet-label for="payment" value="To'lov summasi"/>
                    <x-jet-input id="payment" type="number" name="payment" :value="old('payment')" required autofocus/>
                    <x-jet-input-error for="payment" class="mt-2"/>
                </div>
                <div>
                    <x-jet-label for="comment" value="Tavsif"/>
                    <x-textarea id="comment" name="comment">{!!old('comment')!!}</x-textarea>
                    <x-jet-input-error for="comment" class="mt-2"/>
                </div>
                <div class="flex justify-end">
                    <button
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700 mt-2"
                        type="submit">
                        Saqlash
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
