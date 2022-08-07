<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">
            O'quvchi haqida ma'lumot
        </h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{$student->id}}</td>
            </tr>
            <tr>
                <th>F.I.O</th>
                <td>{{$student->full_name}}</td>
            </tr>
            <tr>
                <th>Telefon raqam</th>
                <td>
                    @foreach($student->phones as $phone)
                        <a href="tel:{{$phone->phone_number}}">{{$phone->phone_number}}</a>
                        <br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Manzil</th>
                <td>{{$student->address}}</td>
            </tr>
            <tr>
                <th>Guruh</th>
                <td>
                    @foreach($student->groups as $group)
                        {{$group->group->name}}<br>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Qarzdorligi</th>
                <td>
                    <a href="{{route('payment.create.single', $student->slug)}}">
                        {!! $student->balance->getBalance() !!}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Ro'yxatdan o'tkan sana</th>
                <td>{{$student->created_at->format('d-F-Y')}}</td>
            </tr>
        </table>
    </div>
</div>
