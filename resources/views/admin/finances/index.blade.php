<x-dashboard-layout>
  <x-alert />

  <div style="padding:15px;">
    <a href="{{ route('admin.finances.create') }}" class="btn btn-info">إضافة المالية</a>
  </div>
  
  <table class="table">
    <thead>
      <tr>
        <th>رقم#</th>
        <th>الإسم كامل</th>
        <th>المبلغ المدفوع</th>
        <th>المبلغ المستحق</th>

        <th>البلدة</th>
        <th>رقم الهوية</th>
        <th>الهاتف</th>
        <th>هاتف الأهل</th>
        <th>المدرب</th>
        <th>نوع الإشتراك</th>
        <th>عدد الدروس</th>
        <th>سعر الدرس</th>
        <th>طباعة</th>

        <th>تعديل</th>
        <th>حذف</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($finances as $finance)
      <tr>
        <td>{{ $finance->id }}</td>
        <td>{{ $finance->trainee->firstname }} {{ $finance->trainee->lastname }}</td>    
        <td>{{ $finance->paid_money }}</td>
        <td>{{ $finance->owed_money }}</td>
         
        <td>{{ $finance->trainee->town}}</td>
        <td>{{ $finance->trainee->no_id }}</td>
        <td>{{ $finance->trainee->phone }}</td>
        <td>{{ $finance->trainee->parent_phone }}</td>
        <td>{{ $finance->trainee->trainers->firstname }}</td>

        <td>{{ $finance->trainee->Subtype }}</td>
        @if(!empty($finance->trainee->number_of_lessons && $finance->trainee->lesson_price))
        <td>{{ $finance->trainee->number_of_lessons }}</td>
        <td>{{ $finance->trainee->lesson_price }}</td>
        @else
        <td>-</td>
        <td>-</td>
        @endif

    
         <td>
          <a type="submit" class="btn btn-sm btn-primary" href="#">طباعة </a>
        </td>
        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.finances.edit', $finance->id ) }}">تعديل </a>
        </td>
        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.finances.destroy', $finance->id ) }}">حذف</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-dashboard-layout>