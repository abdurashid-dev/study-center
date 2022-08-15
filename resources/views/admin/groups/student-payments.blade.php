<div class="card shadow mb-3">
    <div class="card-header flex justify-between">
        <h2 class="text-lg">Ushbu oydagi to'lovlar</h2>
        <a href="{{route('payment.index')}}" class="btn btn-primary"><i class="fas fa-search-dollar"></i> Barcha
            to'lovlar</a>
    </div>
    <div class="card-body table-responsive overflow-y-auto" style="max-height: 350px">
        <table class="table table-bordered table-hover">
            <tr>
                <th>F.I.O</th>
                <th>Sana</th>
                <th>Summa</th>
                <th>Izoh</th>
            </tr>
            @foreach($group->students as $student)
                @foreach($student->student->payments as $payment)
                    <tr>
                        <td>{{$student->student->full_name}}</td>
                        <td class="whitespace-nowrap">{{\Illuminate\Support\Carbon::parse($payment->date)->format('d-F-Y')}}</td>
                        <td class="whitespace-nowrap">{{number_format($payment->payment, 0, '', ' ')}} uzs</td>
                        <td style="min-width: 150px !important;">{{$payment->comment ?? 'Izoh mavjud emas :('}}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>
</div>
