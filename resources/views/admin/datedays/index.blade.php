<x-dashboard-layout title="DateDays">
  <x-alert />
<style>

  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
  }

  .button {border-radius: 50%;}
</style>

<div class="row">

<div class="col-md-4" style="padding:10px;">
  <a href="{{ route('admin.trainers.create') }}" class="btn btn-info">@lang('words.qa_create_trainer')</a>
</div>
<div class="col-md-4" style="padding:20px;">
  <a href="{{ route('admin.datedays.create') }}" class="btn btn-info"> @lang('words.qa_create_dateday')  </a>
</div>

</div>

<form action="{{ route('admin.datedays.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
      <div class="col-md-4">
        <input type="date" class="form-control" name="date_from">
      </div>
      <div class="col-md-4">
        <input type="time" class="form-control" name="start_time">
      </div>
      <div class="col-md-4 ">
        <input type="time" class="form-control" name="end_time">
      </div>

    </div>
    <div class="col-md-4" style="padding:15px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">أبحث</button>

    </div>

  </form>


  <table class="table">
    <thead>
      <tr>
        <th>@lang('words.trainers.fields.fullname')</th>

        <th>@lang('words.datedays.fields.start_time')</th>
        <th>@lang('words.datedays.fields.end_time')</th>
        <th>@lang('words.datedays.fields.daysname')</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
       $trainerid = 0;
      ?>
      @foreach ($datedays as $dateday)
      <tr>
        @if( $dateday->trainer->id != $trainerid )

        <td>{{ $dateday->trainer->firstname }} {{ $dateday->trainer->lastname }}</td>
        @else
        <td></td>
        @endif
    
        <td>{{ $dateday->start_time }} </td>
        <td>{{ $dateday->end_time }}</td>
        <?php
          $trainerid = $dateday->trainer->id;
        ?>

        @foreach ($dateday->daysname as $daysname)
        <td>
        <a href="{{ route('admin.appointments.index') }}" class="button">{{ $daysname->day_name }}</a>
  
        @endforeach

     
   
      </tr>
      @endforeach
    </tbody>
  </table>

</x-dashboard-layout>