<x-app-layout>
    @section('styles')
        @include('links.toastr-css')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    @endsection
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                To'lov haqida
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('payment.index')}}">
                <i class="fas fa-arrow-left"></i>
                Orqaga
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="py-3 px-6">
                                Payment ID
                            </th>
                            <td class="py-3 px-6">
                                {{$payment->id}}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="py-3 px-6">
                                O'quvchi ID
                            </th>
                            <td class="py-3 px-6">
                                {{$payment->student->id}}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="py-3 px-6">
                                O'quvchi F.I.0
                            </th>
                            <td class="py-3 px-6">
                                {{$payment->student->full_name}}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="py-3 px-6">
                                To'lov summasi
                            </th>
                            <td class="py-3 px-6">
                                {{number_format($payment->payment, 0, ',', ' ')}} uzs
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="py-3 px-6">
                                Chegirma summasi
                            </th>
                            <td class="py-3 px-6">
                                @if(is_null($payment->discount))
                                    0 uzs
                                @else
                                    {{number_format($payment->discount, 0, ',', ' ')}} uzs
                                @endif
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="py-3 px-6">
                                To'lov haqida ma'lumot
                            </th>
                            <td class="py-3 px-6">
                                {{$payment->comment ?? "Izoh mavjud emas :("}}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="py-3 px-6">
                                To'lov vaqti
                            </th>
                            <td class="py-3 px-6">
                                {{$payment->created_at->format('d.m.Y')}}
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="py-3 px-6">
                                Harakatlar
                            </th>
                            <td class="py-6 px-6">
                                <a href="{{route('students.show', $payment->student->slug)}}"
                                   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 whitespace-nowrap">
                                    <i class="fas fa-arrow-right"></i>
                                    Batafsil
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
