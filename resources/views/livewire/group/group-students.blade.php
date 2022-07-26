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
                                            class="btn btn-success whitespace-nowrap"><i
                                                class="fas fa-check-circle"></i> {{number_format($student->balance, 0, '', ' ')}} uzs</span>
                                    @elseif($student->balance < 0)
                                        <a href="{{route('payment.create.single', $student->slug)}}"
                                           class="btn btn-danger"><i
                                                class="fas fa-times-circle whitespace-nowrap"></i> {{number_format(abs($student->balance), 0, '', ' ')}}
                                            uzs</a>
                                    @else
                                        <span
                                            class="btn btn-success whitespace-nowrap"><i
                                                class="fas fa-check-circle"></i> Qarzdor emas</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{route('payment.create.single', $student->slug)}}"
                                       class="btn btn-success whitespace-nowrap">
                                        <i class="fas fa-coins"></i>
                                        To'lov qilish
                                    </a>
                                    <a href="{{route('students.show', $student->slug)}}"
                                       class="btn btn-primary ml-2 whitespace-nowrap"><i
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
                    {{$students->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
