<div>
    <div class="card shadow">
        <div class="card-header">
            <h3 class="text-lg">O'quvchilar ro'yxati</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <input type="search" placeholder="Qidiruv..." class="form-control" wire:model="search">
                </div>
                <div class="col-12 table-responsive my-3">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>#</th>
                            <th>F.I.O</th>
                            <th>Qarzdorlik</th>
                            <th>Harakatlar</th>
                        </tr>
                        @forelse($students as $student)
                            <tr>
                                <td>{{($students->currentpage()-1)*$students->perpage() + ($loop->index+1)}}</td>
                                <td>
                                    <a href="{{route('students.show', $student->slug)}}">
                                        {{$student->full_name}}
                                    </a>
                                </td>
                                <td>
                                    @if($student->balance > 0)
                                        <span
                                            class="btn btn-success"><i class="fas fa-check-circle"></i> {{number_format($student->balance, 0, '', ' ')}} uzs</span>
                                    @elseif($student->balance < 0)
                                        <span
                                            class="btn btn-danger"><i class="fas fa-times-circle"></i> {{number_format(abs($student->balance), 0, '', ' ')}} uzs</span>
                                    @else
                                        <span
                                            class="btn btn-success"><i
                                                class="fas fa-check-circle"></i> Qarzdor emas</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('students.show', $student->slug)}}" class="btn btn-primary"><i
                                            class="fas fa-eye"></i> Ko'rish</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <h4>O'quvchilar mavjud emas</h4>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
