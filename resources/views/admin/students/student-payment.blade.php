<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            O'quvchi to'lov tarixi
        </h3>
    </div>
    <div class="card-body overflow-y-auto table-responsive" style="max-height: 400px">
        <table class="table table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Sana</th>
                <th>Summa</th>
                <th>Izoh</th>
            </tr>
            @forelse($student_payments as $payment)
                <tr>
                    <td>
                        {{ $loop->index + 1 }}
                    </td>
                    <td>{{\Illuminate\Support\Carbon::parse($payment->created_at)->format('d-F-Y')}}</td>
                    <td>
                        {{number_format($payment->payment, 0, '', ' ')}} uzs
                    </td>
                    <td>{{($payment->comment) ?? 'Izoh mavjud emas'}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="alert alert-info">
                            <h5 class="alert-heading">
                                <i class="fas fa-info-circle"></i>
                                <span>
                                    O'quvchi hali to'lov qilmagan
                                </span>
                            </h5>
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
