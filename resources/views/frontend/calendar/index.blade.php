@extends('layouts.welcome-layout')
@section('content')
    <div class="table-responsive mt-10">
        <h3 class="h3 text-center m-3">Guruhlar</h3>
        <table class="table table-bordered text-white">
            <tr>
                <th>ID</th>
                <th>Guruh nomi</th>
                <th>Taqvim</th>
            </tr>
            @forelse($groups as $group)
                <tr>
                    <td>
                        {{$loop->index+1}}
                    </td>
                    <td>
                        {{$group->name}}
                    </td>
                    <td>
                        <a href="" class="btn btn-primary">Ko'rish</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Guruh topilmadi :(</td>
                </tr>
            @endforelse
        </table>
        {{$groups->links()}}
    </div>
@endsection
