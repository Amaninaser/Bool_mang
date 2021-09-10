<x-dashboard-layout>
  <x-alert />
  <div style="padding:15px;">
    <a href="{{ route('admin.appointments.create') }}" class="btn btn-info">@lang('words.qa_book_appointment') </a>
  </div>

  <form action="{{ route('admin.attendance.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
    <div class="col-md-4">
        <input type="text" class="form-control" name="firstname" placeholder="@lang('words.qa_search_by_name')">
      </div>
      <div class="col-md-4">
        <input type="text" class="form-control" name="lastname" placeholder="@lang('words.qa_select_trainer_name')">
      </div>
      <div class="col-md-4 ">
        <input type="text" class="form-control" name="" placeholder="@lang('words.qa_search_by_status')">
      </div>

    </div>
    <div class="col-md-4" style="padding:25px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">@lang('words.qa_search')</button>

    </div>

  </form>
  <table class="table">
    <thead>
      <tr>
      <th>@lang('words.trainees.fields.fullname')</th>
        <th>@lang('words.trainers.fields.fullname')</th>
        <th>@lang('words.trainees.fields.Subtype')</th>
        <th>@lang('words.trainees.fields.number_of_lessons')</th>
        <th>@lang('words.trainees.fields.lesson_price')</th>
        <!-- <th>تاريخ اللقاء</th>
        <th>يوم اللقاء</th> -->
        <th>@lang('words.attendance.fields.Time_from')</th>
        <th>@lang('words.attendance.fields.Time_To')</th>
        <th>@lang('words.attendance.fields.audience')</th>
        <th>@lang('words.attendance.fields.status')</th>
        <th>@lang('words.attendance.title')</th>
        <th>@lang('words.qa_delete')</th>
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
        <td>__</td>
        @endif

        <td>{{ $appointment->status }}</td>


        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.attendance.edit', $appointment->id ) }}">@lang('words.attendance.title')</a>
        </td>
        <td>
          <form action="{{route('admin.attendance.destroy', $appointment->id ) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-primary">@lang('words.qa_delete')</button>
          </form>
        </td>



      </tr>
      @endforeach
    </tbody>
  </table>

</x-dashboard-layout>