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
                            Kelgan
                        @elseif($attendance->status == 2)
                            Sababli kelmagan
                        @else
                            Kelmagan
                        @endif
                    </td>
                    <td>{{$attendance->comment}}</td>
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
