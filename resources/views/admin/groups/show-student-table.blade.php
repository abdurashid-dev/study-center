<div class="table-responsive">
    <table class="table table-bordered table-hover" id="students-table">
        <thead>
        <tr>
            <th>#</th>
            <th>F.I.O</th>
            <th>Telefon</th>
            <th>Harakatlar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($group->students as $student)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$student->student->full_name}}</td>
                <td>
                    @forelse($student->student->phones as $phone)
                        <a href="tel:{{$phone->phone_number}}">
                            {{$phone->phone_number}}
                        </a><br>
                    @empty
                        Telefon raqam topilmadi :(
                    @endforelse
                </td>
                <td>
                    <a href="{{route('students.show',$student->student->slug)}}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i> Ko'rish
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">
                    <h3>O'quvchilar topilmadi :(</h3>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
