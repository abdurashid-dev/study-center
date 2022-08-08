<div class="card">
    <div class="card-header">
        <h3 class="card-title text-lg">
            O'quvchi davomati
        </h3>
    </div>
    <div class="card-body overflow-y-auto table-responsive" style="max-height: 350px">
        <table class="table table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Sana</th>
                <th>Holat</th>
                <th>Izoh</th>
            </tr>
            @forelse($attendances as $attendance)
                <tr>
                    <td>{{ (($attendances->currentpage()-1)*$attendances->perpage()+($loop->index+1)) }}</td>
                    <td>{{\Illuminate\Support\Carbon::parse($attendance->date)->format('d-F-Y')}}</td>
                    <td>
                        @if($attendance->status == 1)
                            <div class="btn btn-sm btn-success">
                                <i class="fas fa-check-circle"></i> Kelgan
                            </div>
                        @elseif($attendance->status == 2)
                            <div class="btn btn-sm btn-warning">
                                <i class="fas fa-question-circle"></i> Sababli kelmagan
                            </div>
                        @else
                            <div class="btn btn-sm btn-danger">
                                <i class="fas fa-times-circle"></i> Kelmagan
                            </div>
                        @endif
                    </td>
                    <td>{{$attendance->comment ?? 'Izoh mavjud emas'}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="alert alert-info">
                            <h5 class="alert-heading">
                                <i class="fas fa-info-circle"></i>
                                <span>
                                                                O'quvchi yangi yoki umuman darslarda qatnashmagan
                                                            </span>
                            </h5>
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
        {{$attendances->links()}}
    </div>
</div>
