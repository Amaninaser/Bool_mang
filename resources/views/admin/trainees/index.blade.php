<x-dashboard-layout>
  <x-alert />

  <div style="padding:15px;">
    <a href="{{ route('admin.trainees.create') }}" class="btn btn-info">@lang('words.qa_create_trainee')</a>
  </div>

  <form style="padding:15px;" action="{{ route('trainee.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <button type="submit" class="btn">@lang('words.qa_save')</button>
      </div>
      <div class="col-md-6">

        <input type="file" class="btn btn-info" name="file">
      </div>


    </div>
  </form>


  <form action="{{ route('admin.trainees.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
      <div class="col-md-4">
        <input type="text" class="form-control" name="firstname" placeholder="@lang('words.qa_search_by_name')">
      </div>
      <div class="col-md-4">
        <input type="text" class="form-control" name="phone" placeholder="@lang('words.qa_search_by_phome')">
      </div>
      <div class="col-md-4 ">
        <input type="text" class="form-control" name="no_id" placeholder="@lang('words.qa_search_by_noid')">
      </div>

    </div>
    <div class="col-md-4" style="padding-left:15px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">@lang('words.qa_search')</button>

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
        <th>@lang('words.trainees.fields.id')</th>
        <th>@lang('words.trainees.fields.fullname')</th>
        <th>@lang('words.trainees.fields.town')</th>
        <th>@lang('words.trainees.fields.no_id')</th>
        <th>@lang('words.trainees.fields.phone')</th>
        <th>@lang('words.trainees.fields.parent_phone')</th>
        <th>@lang('words.trainees.fields.trainer_id')</th>
        <th>@lang('words.trainees.fields.Subtype')</th>
        <th>@lang('words.trainees.fields.number_of_lessons')</th>
        <th>@lang('words.trainees.fields.lesson_price')</th>
        <th>@lang('words.qa_edit')</th>
        <th>@lang('words.qa_delete')</th>

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
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.trainees.edit', $trainee->id ) }}">@lang('words.qa_edit') </a>
        </td>
          <td>
                   <form action="{{route('admin.trainees.destroy', $trainee->id ) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-primary">@lang('words.qa_delete')</button>
                    </form>
          </td>
       
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $trainees->links() }}
</x-dashboard-layout>