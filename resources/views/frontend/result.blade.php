@extends('layouts.welcome-layout')
@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <main role="main" class="mt-4 mx-auto w-100 mb-4">
                <div class="mb-1">
                    <form class="form" action="{{route('search')}}" method="GET">
                        <div class="inline-group global-search-div">
                            <span class="global-search-icon"><i class="fa fa-search"></i></span>
                            <input class="form-control form-control-lg" name="q" minlength="3"
                                   type="search"
                                   id="search"
                                   placeholder="O'quvchi ismi, familiyasi, otasining ismi, manzili, ID raqami" required>
                        </div>
                    </form>
                </div>
                <div class="my-3" style="font-size: .9rem;">
                    <a class="back-to-search-link" href="{{route('welcome')}}"><i
                            class="fa fa-arrow-left"></i> Orqaga qaytish</a>
                </div>
                <div class="card bg-dark my-2 p-3 text-left">
                    <h4 class="mb-4">
                        {{$student->full_name}}
                    </h4>
                    <dl class="row organization-detail">
                        <dt class="col-4">Status</dt>
                        <dd class="col-8">
                            @if($student->deleted)
                                <span class="badge badge-danger rounded-0">O'chirilgan</span>
                            @else
                                <span class="badge badge-success rounded-0">Hozirda mavjud</span>
                            @endif
                        </dd>
                        <dt class="col-sm-4">Ro'yxatdan o'tgan sana</dt>
                        <dd class="col-sm-8">{{$student->created_at->format('d.m.Y')}}</dd>
                        <dt class="col-sm-4">Manzil</dt>
                        <dd class="col-sm-8">{{$student->address ?? "Manzil haqida ma'lumot topilmadi"}}</dd>
                        <dt class="col-sm-4">Guruh</dt>
                        <dd class="col-sm-8">
                            @forelse($student->groups as $group)
                                <span class="badge badge-primary rounded-0 mr-1">{{$group->group->name}}</span>
                            @empty
                                <span class="badge badge-danger rounded-0 mr-1">Guruh topilmadi</span>
                            @endforelse
                        </dd>
                        <dt class="col-sm-4">Telefon raqam</dt>
                        <dd class="col-sm-8">
                            @forelse($student->phones as $phone)
                                <span class="badge badge-primary rounded-0 mr-1">{{$phone->phone_number}}</span>
                            @empty
                                <span class="badge badge-danger rounded-0 mr-1">Telefon raqam topilmadi</span>
                            @endforelse
                        </dd>
                        <dt class="col-sm-4">Qarzdorlik</dt>
                        <dd class="col-sm-8">
                            @if($student->balance->balance < 0)
                                <span class="badge badge-danger rounded-0">Qarzdor</span>
                            @else
                                <span class="badge badge-success rounded-0">Qarzdor emas</span>
                            @endif
                        </dd>
                        @if($student->balance->balance < 0)
                            <dt class="col-sm-4">Qarz miqdori</dt>
                            <dd class="col-sm-8">{{number_format(abs($student->balance->balance), 0, '', ' ',)}}uzs
                            </dd>
                        @endif
                        <dt class="col-sm-12 mt-3">
                            <h5>Oxirgi 1 haftalik davomat ro'yxati
                                <hr>
                            </h5>
                        </dt>
                        <dt class="col-sm-12 table-responsive">
                            <table class="table table-bordered text-white mt-2">
                                <tr>
                                    <th>Sana</th>
                                    <th>Status</th>
                                    <th>Izoh</th>
                                </tr>
                                @forelse($student->attendances as $attendance)
                                    <tr>
                                        <td>{{$attendance->created_at->format('d.m.Y')}}</td>
                                        <td>
                                            @if($attendance->status == 1)
                                                <span class="btn btn-sm btn-success rounded-0">Kelgan</span>
                                            @elseif($attendance->status == 2)
                                                <span class="badge badge-danger rounded-0">Kelmagan</span>
                                            @else
                                                <span class="badge badge-warning rounded-0">Sababli kelmagan</span>
                                            @endif
                                        </td>
                                        <td>{{$attendance->comment ?? "Izoh mavjud emas"}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Davomat topilmadi</td>
                                    </tr>
                                @endforelse
                            </table>
                        </dt>

                        <dt class="col-sm-12 mt-3">
                            <h5>Oxirgi 3 oylik to'lovlar ro'yxati
                                <hr>
                            </h5>
                        </dt>
                        <dt class="col-sm-12 table-responsive">
                            <table class="table table-bordered text-white mt-2">
                                <tr>
                                    <th>Sana</th>
                                    <th>Summa</th>
                                    <th>Izoh</th>
                                </tr>
                                @forelse($student->payments as $payment)
                                    <tr>
                                        <td>{{$payment->created_at->format('d.m.Y')}}</td>
                                        <td>
                                            {{number_format($payment->payment, 0, '', ' ',)}} uzs
                                        </td>
                                        <td>{{$payment->comment ?? "Izoh mavjud emas"}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">To'lovlar topilmadi</td>
                                    </tr>
                                @endforelse
                            </table>
                        </dt>
                    </dl>


                    <div class="px-3 pt-2 pb-1" style="background-color: #353030;">
                        <h6>
                            <small>
                                <strong>Eslatma:</strong> Yuqorida keltirilgan
                                ma'lumotlar {{\Illuminate\Support\Carbon::now()->format('d.m.Y')}} kun uchun aktual.
                            </small>
                        </h6>

                    </div>
                </div>
                <div class="p-2 mt-3 card bg-dark">
                    <h6 class="ml-2">Havolalar</h6>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <a href="https://t.me/hurmatulloh_group" class="btn btn-primary btn-block rounded-0"><i
                                    class="fab fa-telegram-plane"></i> Telegram</a>
                        </div>
                        <div class="col-6">
                            <a href="https://github.com/Abdurashid-dev/" target="_blank"
                               class="btn btn-secondary btn-block rounded-0"><i class="fab fa-github"></i> Github</a>
                        </div>
                    </div>
                </div>

            </main><!-- /.container -->
        </div>
    </div>
@endsection
