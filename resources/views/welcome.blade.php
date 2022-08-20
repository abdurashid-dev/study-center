@extends('layouts.welcome-layout')
@section('content')
    <div class="row my-auto text-center">
        <div class="col-lg-8 mx-auto">
            <main role="main" class="">
                <h2 class="cover-heading">O'quvchi haqida ma'lumot</h2>
                <form class="form" action="{{route('search')}}" method="POST">
                    @csrf
                    <div class="inline-group global-search-div">
                        <span class="global-search-icon"><i class="fa fa-search"></i></span>
                        <input class="form-control form-control-lg" name="search" minlength="3" type="search"
                               placeholder="O'quvchi ismi, familiyasi, otasining ismi, manzili, ID raqami" required>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection
