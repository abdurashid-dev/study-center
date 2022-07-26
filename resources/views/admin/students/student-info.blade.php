<div class="card shadow-sm">
    <div class="card-header">
        <h1 class="text-lg">
            O'quvchi haqida ma'lumot <i class="far fa-id-card"></i>
        </h1>
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
                <th>Ma'lumot</th>
                <td>{{$student->description ?? 'Izoh mavjud emas :('}}</td>
            </tr>
            <tr>
                <th>Guruh</th>
                <td>
                    @forelse($student->groups as $group)
                        {{$group->group->name}}<br>
                    @empty
                        <span
                            class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900 whitespace-nowrap">
                            Guruh topilmadi :(
                        </span>
                    @endforelse
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
            @if($student->deleted == 1)
                <tr>
                    <th>O'chirilgan sana</th>
                    <td>{!! \Illuminate\Support\Carbon::make($student->deleted_at)->format('d-F-Y')!!}</td>
                </tr>
            @endif
        </table>
    </div>
</div>
