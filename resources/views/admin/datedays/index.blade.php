<x-dashboard-layout title="DateDays">
  <x-alert />

  <div class="row">

<div class="col-md-4" style="padding:10px;">
  <a href="{{ route('admin.trainers.create') }}" class="btn btn-info">إضافة مدرب</a>
</div>
<div class="col-md-4" style="padding:20px;">
  <a href="{{ route('admin.datedays.create') }}" class="btn btn-info">Add Available Date</a>
</div>

</div>

<form action="{{ route('admin.datedays.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
      <div class="col-md-4">
        <input type="date" class="form-control" name="date_from" placeholder="Date_From">
      </div>
      <div class="col-md-4">
        <input type="time" class="form-control" name="start_time" placeholder="Start_Time">
      </div>
      <div class="col-md-4 ">
        <input type="time" class="form-control" name="end_time" placeholder="End_Time">
      </div>

    </div>
    <div class="col-md-4" style="padding:15px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">Search</button>

    </div>

  </form>


  <table class="table">
    <thead>
      <tr>
        <th>ID#</th>
        <th>Full_name</th>
        <th>Date_From</th>
        <th> Date_To</th>

        <th>Start_Time</th>
        <th>End_Time</th>
        <th>Days</th>

        <!-- <th>تعديل</th>
        <th>حذف</th> -->
      </tr>
    </thead>
    <tbody>
      @foreach ($datedays as $dateday)
      <tr>
        <td>{{ $dateday->id }}</td>
        <td>{{ $dateday->trainer->firstname }} {{ $dateday->trainer->lastname }}</td>
        <td>{{ $dateday->date_from }} </td>
        <td>{{ $dateday->date_to }}</td>
        <td>{{ $dateday->start_time }} </td>
        <td>{{ $dateday->end_time }}</td>

        @foreach ($dateday->daysname as $daysname)
        <td>{{ $daysname->day_name}}</a></td>
        @endforeach
        <!-- <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.datedays.edit', $dateday->id ) }}">تعديل </a>
        </td>
        
        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.datedays.destroy', $dateday->id ) }}">حذف</a>
        </td>
         -->
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $datedays->links() }}

</x-dashboard-layout>