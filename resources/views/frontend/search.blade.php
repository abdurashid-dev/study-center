@extends('layouts.welcome-layout')
@section('content')
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <main role="main" class="mt-4 mx-auto w-100">


                <div class="mb-1">
                    <form class="form" action="{{route('search')}}" method="GET">
                        <div class="inline-group global-search-div">
                            <span class="global-search-icon"><i class="fa fa-search"></i></span>
                            <input class="form-control form-control-lg" name="q" minlength="3"
                                   type="search"
                                   value="{{$q}}"
                                   id="search"
                                   placeholder="O'quvchi ismi, familiyasi, otasining ismi, manzili, ID raqami" required>
                        </div>
                    </form>
                </div>
                <!-- Students -->
                <div class="mt-3">
                    <h4 class="">O'quvchilar <small>({{$students->count()}})</small></h4>

                    <div class="oranization-search-result">
                        @forelse($students as $student)
                            <a class="organization-page-link" href="{{route('search.result', $student->slug)}}">
                                <div class="result-item card bg-dark my-2 p-2 text-left">
                                    <h6>
                                        <small style="font-weight: 400;" class="badge badge-primary rounded-0 mr-1">
                                            {{$student->id}}{{rand(10000, 99999)}}
                                        </small>
                                        <small class=" badge badge-tag rounded-0 mr-1" style="font-weight: 300;">
                                            {{$student->created_at->format('d.m.Y')}}
                                        </small>
                                        @if($student->deleted)
                                            <small style="font-weight: 400;" class="badge badge-danger mr-1 rounded-0">O'chirilgan</small>
                                        @endif
                                    </h6>
                                    <h6 class="item-title">
                                        {{$student->full_name}}
                                    </h6>
                                    <small class="organization-address"><i class="fa fa-map-marker-alt"></i>
                                        {{$student->address ?? "Manzil haqida ma'lumot yo'q"}}
                                    </small>
                                </div>
                            </a>
                        @empty
                            <h4 class="text-center">Hech narsa topilmadi :(</h4>
                        @endforelse
                    </div>
                </div>
                <!-- Students -->
            </main><!-- /.container -->
        </div>
    </div>
@endsection
