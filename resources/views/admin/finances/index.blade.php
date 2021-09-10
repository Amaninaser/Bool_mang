<x-dashboard-layout>
  <x-alert />

  <div style="padding:15px;">
    <a href="{{ route('admin.finances.create') }}" class="btn btn-info">@lang('words.qa_create_finance')</a>
  </div>

  <form action="{{ route('admin.finances.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
      <div class="col-md-4">
        <input type="text" class="form-control" name="trainee_id" placeholder="@lang('words.qa_search_by_name')">
      </div>
      <!-- <div class="col-md-4">
        <input type="text" class="form-control" name="lastname" placeholder="@lang('words.qa_select_trainer_name')">
      </div> -->
 <div class="col-md-2" style="padding-bottom:15px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">@lang('words.qa_search')</button>

    </div>
    </div>
   

  </form>
  
  <table class="table">
    <thead>
      <tr>
      <th>@lang('words.finances.fields.id')</th>
        <th>@lang('words.trainees.fields.fullname')</th>
        <th>@lang('words.finances.fields.paid_money')</th>
        <th>@lang('words.finances.fields.owed_money')</th>

        <th>@lang('words.trainees.fields.town')</th>
        <th>@lang('words.trainees.fields.no_id')</th>
        <th>@lang('words.trainees.fields.phone')</th>
        <th>@lang('words.trainees.fields.parent_phone')</th>
        <th>@lang('words.trainers.fields.fullname')</th>
        <th>@lang('words.trainees.fields.Subtype')</th>
        <th>@lang('words.trainees.fields.number_of_lessons')</th>
        <th>@lang('words.trainees.fields.lesson_price')</th>
        <th>@lang('words.trainees.fields.fullname')</th>

        <th>@lang('words.qa_edit')</th>
        <th>@lang('words.qa_delete')</th>

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
          <a type="submit" class="btn btn-sm btn-primary" href="#">@lang('words.qa_print') </a>
        </td>
        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.finances.edit', $finance->id ) }}">@lang('words.qa_edit') </a>
        </td>
        <td>
                   <form action="{{route('admin.finances.destroy', $finance->id ) }}" method="post">
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