@extends('layouts.welcome-layout')
@section('content')
    <div class="container">

        <h3 class="h3 text-center m-3">Guruhlar ({{$group->name}})</h3>
        <div class="my-3" style="font-size: .9rem;">
            <a class="back-to-search-link" href="{{route('calendar.index')}}"><i
                    class="fa fa-arrow-left"></i> Orqaga qaytish</a>
        </div>
        <div class="table-responsive mt-10">
            <table class="table table-bordered text-white">
                <tr>
                    <th>Hafta kunlari</th>
                    <th>Dars vaqtlari</th>
                </tr>
                @forelse($group_times as $time)
                    @if(!is_null($time->day))
                        <tr>
                            <td>
                                {{$time->day}}
                            </td>
                            <td>
                                {{$time->time}}
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="3" class="text-center">Ma'lumot topilmadi</td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Ma'lumot topilmadi</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
