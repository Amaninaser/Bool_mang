<x-dashboard-layout>
  <x-alert />
  <div style="padding:15px;">
    <a href="{{ route('admin.appointments.create') }}" class="btn btn-info">حجز موعد</a>
  </div>

  <form action="{{ route('admin.attendance.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
      <div class="col-md-4">
        <input type="text" class="form-control" name="firstname" placeholder="بحث حسب إسم المتدرب">
      </div>
      <div class="col-md-4">
        <input type="text" class="form-control" name="lastname" placeholder="بحث حسب إسم المدرب">
      </div>
      <div class="col-md-4 ">
        <input type="text" class="form-control" name="" placeholder="بحث حسب الحالة">
      </div>

    </div>
    <div class="col-md-4" style="padding:25px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">أبحث</button>

    </div>

  </form>
  <table class="table">
    <thead>
      <tr>
        <th>إسم المتدرب كاملا</th>
        <th>إسم المدرب كاملا</th>
        <th>نوع الإشتراك</th>
        <th>عدد الدروس</th>
        <th>سعر الدرس</th>
        <!-- <th>تاريخ اللقاء</th>
        <th>يوم اللقاء</th> -->
        <th>من الساعة</th>
        <th>إلى الساعة</th>
        <th>الحضور</th>
        <th>الحالة</th>
        <th>السجل الحضوري</th>
        <th>حذف</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($appointments as $appointment)
      <tr>
        <td>{{ $appointment->trainee->firstname }} {{ $appointment->trainee->lastname }}</td>
        <td>{{ $appointment->trainer->firstname }} {{ $appointment->trainer->lastname }}</td>
        <td>{{ $appointment->trainee->Subtype }}</td>
        @if(!empty($appointment->trainee->number_of_lessons && $appointment->trainee->lesson_price))
        <td>{{ $appointment->trainee->number_of_lessons }}</td>
        <td>{{ $appointment->trainee->lesson_price }}</td>
        @else
        <td>-</td>
        <td>-</td>
        @endif

        <td>{{ $appointment->Time_from }}</td>

        <td>{{ $appointment->Time_To }}</td>
        @if(!empty($appointment->audience))
        <td>{{$appointment->audience}}</td>
        @else
        <td>لم يتم أخذ الحضور بعد</td>
        @endif

        <td>{{ $appointment->status }}</td>


        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.attendance.edit', $appointment->id ) }}">السجل الحضوري </a>
        </td>
        <td>
          <form action="{{route('admin.attendance.destroy', $appointment->id ) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-primary">حذف</button>
          </form>
        </td>



      </tr>
      @endforeach
    </tbody>
  </table>

</x-dashboard-layout>