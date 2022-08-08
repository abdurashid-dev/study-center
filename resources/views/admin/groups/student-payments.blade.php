<div class="card shadow mb-3">
    <div class="card-header flex justify-between">
        <h2 class="text-lg">Ushbu oydagi to'lovlar</h2>
        <a href="{{route('payment.index')}}" class="btn btn-primary"><i class="fas fa-search-dollar"></i> Barcha to'lovlar</a>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Sana</th>
                <th>Summa</th>
                <th>Izoh</th>
            </tr>
            @foreach($group->students as $student)
                @foreach($student->student->payments as $payment)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{\Illuminate\Support\Carbon::parse($payment->date)->format('d-F-Y')}}</td>
                        <td>{{number_format($payment->payment, 0, '', ' ')}} uzs</td>
                        <td>{{$payment->comment ?? 'Izoh mavjud emas :('}}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>
</div>
