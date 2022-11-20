<div class="card shadow">
    <div class="card-header">
        <h3 class="card-title text-lg">
            O'quvchi oxirgi 10ta imtihon natijalari <i class="fas fa-calendar-check"></i>
        </h3>
    </div>
    <div class="card-body overflow-y-auto table-responsive" style="max-height: 400px">
        <table class="table table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Dtm nomi</th>
                <th>Testlar soni</th>
                <th>To'g'ri javoblar soni</th>
                <th>Sana</th>
            </tr>
            @forelse($student->studentDtms as $dtm)
                <tr>
                    <td>
                        {{ $loop->index + 1 }}
                    </td>
                    <td class="whitespace-nowrap">{{ $dtm->dtm->name }}</td>
                    <td class="whitespace-nowrap">
                        {{ $dtm->dtm->count_tests }}
                    </td>
                    <td class="whitespace-nowrap">
                        {{ $dtm->count_answers }}
                    </td>
                    <td style="min-width: 150px !important;">{{$dtm->created_at->format('d-F-Y')}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="alert alert-info">
                            <h5 class="alert-heading">
                                <i class="fas fa-info-circle"></i>
                                <span>
                                    O'quvchi hali imtihon topshirmagan
                                </span>
                            </h5>
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
