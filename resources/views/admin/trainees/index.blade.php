<x-dashboard-layout>
  <x-alert />

  <div style="padding:15px;">
    <a href="{{ route('admin.trainees.create') }}" class="btn btn-info">إضافة مشترك</a>
  </div>

  <form style="padding:15px;" action="{{ route('trainee.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <button type="submit" class="btn">أضف</button>
      </div>
      <div class="col-md-6">

        <input type="file" class="btn btn-info" name="file">
      </div>


    </div>
  </form>

  <!-- <form action="{{ route('trainee.import') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <button type="submit" class="btn">أضف</button>

  </form> -->


  <form action="{{ route('admin.trainees.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
      <div class="col-md-4">
        <input type="text" class="form-control" name="firstname" placeholder="بحث حسب إسم المشترك">
      </div>
      <div class="col-md-4">
        <input type="text" class="form-control" name="phone" placeholder="بحث حسب رقم الهاتف">
      </div>
      <div class="col-md-4 ">
        <input type="text" class="form-control" name="no_id" placeholder="بحث حسب رقم الهوية">
      </div>

    </div>
    <div class="col-md-4" style="padding-left:15px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">أبحث</button>

    </div>

  </form>
  <div class="row" style="padding:10px;" style="padding-left:15px;">


    <div class="col-md-6">
    <a href="{{ route('trainee.export') }}" class="btn btn-info" style="background:#903479; color: #fff;">إضافة مشترك</a>

    </div>
    <div class="col-md-6">    
        <button type="submit" class="btn" style="background:#903479; color: #fff;">طباعة</button>

    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>رقم#</th>
        <th>الإسم الكامل</th>
        <th>البلدة</th>
        <th>رقم الهوية</th>
        <th>الهاتف</th>
        <th>هاتف الأهل</th>
        <th>إسم المدرب</th>
        <th>نوع الإشتراك</th>
        <th>عدد الدروس</th>
        <th>سعر الدرس</th>
        <th>تعديل</th>
        <th>حذف</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($trainees as $trainee)
      <tr>
        <td>{{ $trainee->id }}</td>
        <td>{{ $trainee->firstname }} {{ $trainee->lastname }}</td>
        <td>{{ $trainee->town}}</td>
        <td>{{ $trainee->no_id }}</td>
        <td>{{ $trainee->phone }}</td>
        <td>{{ $trainee->parent_phone }}</td>
        @if(!empty($trainee->trainers->firstname))
        <td>{{ $trainee->trainers->firstname}} {{ $trainee->trainers->lastname}}</td>
        @else
        <td>-</td>
        @endif

        <td>{{ $trainee->Subtype }}</td>
        @if(!empty($trainee->number_of_lessons && $trainee->lesson_price))
        <td>{{ $trainee->number_of_lessons }}</td>
        <td>{{ $trainee->lesson_price }}</td>
        @else
        <td>-</td>
        <td>-</td>
        @endif

        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.trainees.edit', $trainee->id ) }}">تعديل </a>
        </td>
          <td>
                   <form action="{{route('admin.trainees.destroy', $trainee->id ) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-primary">حذف</button>
                    </form>
          </td>
       
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $trainees->links() }}
</x-dashboard-layout>