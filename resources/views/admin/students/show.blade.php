<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
    @endsection
    <x-slot name="header">
        <div class="flex justify-between align-middle">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$student->full_name}}
            </h2>
        </div>
    </x-slot>
    <section class="mt-6">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
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
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <th>F.I.O</th>
                                            <td>{{$student->full_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Telefon raqam</th>
                                            <td>
                                                @foreach($student->phones as $phone)
                                                    {{$phone->phone_number}}<br>
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
