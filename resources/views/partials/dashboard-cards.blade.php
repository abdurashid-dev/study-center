<div class="flex flex-wrap">

    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <a href="{{route('payment.index')}}">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Ushbu oydagi
                                    to'lovlar</p>
                                <h5 class="mb-0 font-bold">
                                    {{number_format($paymentForMonth, 0, ',', ',')}}
                                    <span
                                        class="leading-normal text-sm font-weight-bolder text-black-500">UZS</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-600 to-blue-300">
                                <i class="fas fa-coins text-lg leading-none relative top-3.5 text-white"></i>
                                {{--                                        <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <a href="{{route('students.index')}}">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">O'quvchilar
                                    soni</p>
                                <h5 class="mb-0 font-bold">
                                    {{$studentsCount}}
                                    <span
                                        class="leading-normal text-sm font-weight-bolder text-black-500">ta</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-600 to-blue-300">
                                <i class="fas fa-users leading-none text-lg relative top-3.5 text-white"></i>
                                {{--                                        <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <a href="{{route('groups.index')}}">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Guruhlar soni</p>
                                <h5 class="mb-0 font-bold">
                                    {{$groupsCount}}
                                    <span
                                        class="leading-normal text-black-600 text-sm font-weight-bolder">ta</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-600 to-blue-300">
                                {{--                                        <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>--}}
                                <i class="fas fa-layer-group leading-none text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <a href="#unpaidStudents">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Qarzdor
                                    o'quvchilar soni</p>
                                <h5 class="mb-0 font-bold">
                                    {{$unpaidStudentsCount}}
                                    <span
                                        class="leading-normal text-sm font-weight-bolder text-black-500">ta</span>
                                    <span
                                        class="leading-normal text-sm font-weight-bolder text-red-500">{{round($unpaidStudentsPercent)}}%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-600 to-blue-300">
                                <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                <i class="fas fa-hourglass-half leading-none text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
