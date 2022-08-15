<x-app-layout>
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
              crossorigin="anonymous">
    @endsection
    <x-slot name="header">
        <div class="d-flex justify-between items-center">
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
    <section class="py-6">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 mt-3">
                            @include('admin.students.student-info')
                        </div>
                        <div class="col-md-7 col-sm-12 mt-3">
                            @include('admin.students.student-attendance')
                        </div>
                        <div class="col-md-12 mt-3">
                            @include('admin.students.student-payment')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
