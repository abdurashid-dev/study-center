<div>
    @section('styles')
        @include('links.toastr-css')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    @endsection
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                To'lovlar
            </h2>
            <a
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 dark:focus:bg-blue-700"
                href="{{route('payment.create')}}">
                <i class="fas fa-plus"></i>
                To'lov qo'shish
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                {{--                <input class="form-control form-control-solid" placeholder="Pick date rage" id="kt_daterangepicker_4"/>--}}
                {{--                <div id="hiddenParent"></div>--}}
                {{--                {{$start}}--}}
                <x-search/>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                F.I.O
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Summa
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Chegirma
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Vaqt
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Harakatlar
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($payments as $payment)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="py-3 px-6">
                                    {{(($payments->currentpage()-1)*$payments->perpage()+($loop->index+1)) }}
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $payment->student->slug)}}"
                                       class="text-gray-900 dark:text-white">
                                        {{$payment->student->full_name}}
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $payment->student->slug)}}"
                                       class="text-gray-900 dark:text-white whitespace-nowrap">
                                        {{number_format($payment->payment, 0, ',', ' ')}} uzs
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $payment->student->slug)}}"
                                       class="text-gray-900 dark:text-white whitespace-nowrap">
                                        {{number_format($payment->discount, 0, ',', ' ')}} uzs
                                    </a>
                                </td>
                                <td class="py-3 px-6">
                                    <a href="{{route('students.show', $payment->student->slug)}}"
                                       class="text-gray-900 dark:text-white whitespace-nowrap">
                                        {{$payment->created_at->format('d-F-Y')}}
                                    </a>
                                </td>
                                <td class="py-4 px-8">
                                    <a href="{{route('payment.show', $payment->id)}}"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 whitespace-nowrap">
                                        <i class="fas fa-eye"></i> Ko'rish
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center py-3 px-6">
                                O'quvchilar topilmadi :(
                            </td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="my-3">
                    {{$payments->links()}}
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('links.toastr-js')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script>
            $(function () {
                //    change also livewire model value
                $('#kt_daterangepicker_4').daterangepicker({
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                }, function (start, end) {
                    $('#kt_daterangepicker_4').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    Livewire.emit('search', start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                })
            });
        </script>
    @endsection
</div>
