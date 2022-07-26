<div class="card shadow">
    <div class="card-header">
        <h3 class="card-title text-lg">
            O'quvchi to'lov tarixi <i class="fas fa-history"></i>
        </h3>
    </div>
    <div class="card-body overflow-y-auto table-responsive" style="max-height: 400px">
        <table class="table table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Sana</th>
                <th>To'lov summasi</th>
                <th>Chegirma summasi</th>
                <th>Izoh</th>
            </tr>
            @forelse($student_payments as $payment)
                <tr>
                    <td>
                        {{ $loop->index + 1 }}
                    </td>
                    <td class="whitespace-nowrap">{{\Illuminate\Support\Carbon::parse($payment->created_at)->format('d-F-Y')}}</td>
                    <td class="whitespace-nowrap">
                        {{number_format($payment->payment, 0, '', ' ')}} uzs
                    </td>
                    <td class="whitespace-nowrap">
                        {{number_format($payment->discount, 0, '', ' ')}} uzs
                    </td>
                    <td style="min-width: 150px !important;">{{($payment->comment) ?? 'Izoh mavjud emas'}}</td>
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
