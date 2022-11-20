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
                    <a class="back-to-search-link" href="{{route('frontend.dtm')}}"><i
                            class="fa fa-arrow-left"></i> Orqaga qaytish</a>
                </div>

                <div class="card bg-dark my-2 p-3 text-left">
                    <dt class="col-sm-12 mt-3">
                        <h5>Imtihon natijalari ro'yxati <br>({{$dtm->name}})
                            <hr>
                        </h5>
                    </dt>
                    <dt class="col-12 table-responsive">
                        <table class="table table-bordered text-white mt-2">
                            <tr>
                                <th>#</th>
                                <th>O'quvchi</th>
                                <th>Guruh</th>
                                <th>Testlar soni</th>
                                <th>To'gri javoblar soni</th>
                                <th>Sana</th>
                                <th>Ko'proq</th>
                            </tr>
                            @forelse($students as $student)
                                <tr>
                                    <td>{{(($students->currentpage()-1)*$students->perpage()+($loop->index+1)) }}</td>
                                    <td style="white-space: nowrap"> {{$student->student->full_name}}</td>
                                    <td style="white-space: nowrap">{{$dtm->getGroupName($dtm->group_id)}}</td>
                                    <td>{{$dtm->count_tests}}</td>
                                    <td>{{$student->count_answers}}</td>
                                    <td>{!! $dtm->created_at->format('d.m.Y')!!}</td>
                                    <td><a href="{{route('search.result', $student->student->slug)}}" class="btn btn-primary btn-sm">Ko'proq</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Imtihon natijalari topilmadi</td>
                                </tr>
                            @endforelse
                        </table>
                    </dt>

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
