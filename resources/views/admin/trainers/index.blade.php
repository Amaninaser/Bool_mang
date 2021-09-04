<x-dashboard-layout title="Trainers">
  <x-alert />

  <div class="" style="padding:10px;">
    <a href="{{ route('admin.trainers.create') }}" class="btn btn-info">إضافة مدرب</a>
  </div>


  <form action="{{ route('admin.trainers.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
      <div class="col-md-4">
        <input type="text" class="form-control" name="firstname" placeholder="الإسم كامل ">
      </div>
     
      <div class="col-md-4 ">
        <input type="text" class="form-control" name="phone" placeholder="رقم الهاتف">
      </div>

   </div>
    <div class="col-md-4" style="padding:15px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">أبحث</button>

    </div>

  </form>
  <table class="table">
    <thead>
      <tr>
        <th>رقم#</th>
        <th>الإسم كامل</th>
        <th>الهاتف</th>
        <th>إضافة موعد</th>

        <th>تعديل</th>
        <th>حذف</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($trainers as $trainer)
      <tr>
        <td>{{ $trainer->id }}</td>
        <td>{{ $trainer->firstname }} {{ $trainer->lastname }}</td>
        <td>{{ $trainer->phone }}</td>
        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.datedays.create' ) }}">إضافة</a>
        </td>
       <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.trainers.edit', $trainer->id ) }}">تعديل </a>
        </td> 

        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.trainers.destroy', $trainer->id ) }}">حذف</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $trainers->links() }}

</x-dashboard-layout>