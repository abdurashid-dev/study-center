<x-app-layout>
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
    @endsection
    <x-slot name="header">
        <div class="d-flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$student->full_name}}
            </h2>
            <a
                class="btn btn-primary"
                href="{{route('students.index')}}">
                <i class="fas fa-arrow-left"></i> Orqaga
            </a>
        </div>
    </x-slot>
    <section class="my-6">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 mt-3">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        O'quvchi haqida ma'lumot
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ID</th>
                                            <td>{{$student->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>F.I.O</th>
                                            <td>{{$student->full_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Telefon raqam</th>
                                            <td>
                                                @foreach($student->phones as $phone)
                                                    <a href="tel:{{$phone->phone_number}}">{{$phone->phone_number}}</a>
                                                    <br>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Manzil</th>
                                            <td>{{$student->address}}</td>
                                        </tr>
                                        <tr>
                                            <th>Guruh</th>
                                            <td>
                                                @foreach($student->groups as $group)
                                                    {{$group->group->name}}<br>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Qarzdorligi</th>
                                            <td>
                                                <a href="{{route('payment.create.single', $student->slug)}}">
                                                    {!! $student->balance->getBalance() !!}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ro'yxatdan o'tkan sana</th>
                                            <td>{{$student->created_at->format('d-F-Y')}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        O'quvchi davomati
                                    </h3>
                                </div>
                                <div class="card-body overflow-y-auto" style="max-height: 350px">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th>#</th>
                                            <th>Sana</th>
                                            <th>Holat</th>
                                            <th>Izoh</th>
                                        </tr>
                                        @forelse($attendances as $attendance)
                                            <tr>
                                                <td>{{ (($attendances->currentpage()-1)*$attendances->perpage()+($loop->index+1)) }}</td>
                                                <td>{{\Illuminate\Support\Carbon::parse($attendance->date)->format('d-F-Y')}}</td>
                                                <td>
                                                    @if($attendance->status == 1)
                                                        Kelgan
                                                    @elseif($attendance->status == 2)
                                                        Sababli kelmagan
                                                    @else
                                                        Kelmagan
                                                    @endif
                                                </td>
                                                <td>{{$attendance->comment}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">
                                                    <div class="alert alert-info">
                                                        <h5 class="alert-heading">
                                                            <i class="fas fa-info-circle"></i>
                                                            <span>
                                                                O'quvchi yangi yoki umuman darslarda qatnashmagan
                                                            </span>
                                                        </h5>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </table>
                                    {{$attendances->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
