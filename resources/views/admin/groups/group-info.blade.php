<div class="card shadow mb-3">
    <div class="card-header">
        <h2 class="text-lg">Ma'lumot</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <td>{{$group->id}}</td>
            </tr>
            <tr>
                <th>Nomi</th>
                <td>{{$group->name}}</td>
            </tr>
            <tr>
                <th>Guruh haqida</th>
                <td>{{$group->description ?? 'Izoh mavjud emas'}}</td>
            </tr>
            <tr>
                <th>O'quvchilar soni</th>
                <td>{{$group->students->count()}}</td>
            </tr>
            <tr>
                <th>Guruh ochilgan sana</th>
                <td>{{\Carbon\Carbon::parse($group->created_at)->format('d-F-Y')}}</td>
            </tr>
            <tr>
                <th>Ushbu oydagi to'lov ({{date('F')}})</th>
                <td>{{number_format($paymentOfThisMonth, 0, '', ' ')}} uzs</td>
            </tr>
        </table>
    </div>
</div>
