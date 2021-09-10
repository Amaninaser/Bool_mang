<x-dashboard-layout title="Trainers">
  <x-alert />

  <div class="" style="padding:10px;">
    <a href="{{ route('admin.trainers.create') }}" class="btn btn-info">@lang('words.qa_create_trainer')</a>
  </div>

  <form action="{{ route('admin.trainers.index') }}" method="get" class="d-flex probootstrap-section">
    <div class="row">
      <div class="col-md-4">
        <input type="text" class="form-control" name="firstname" placeholder="@lang('words.qa_search_by_trainer_name')">
      </div>
     
      <div class="col-md-4 ">
        <input type="text" class="form-control" name="phone" placeholder="@lang('words.qa_search_by_phome')">
      </div>

   </div>
    <div class="col-md-4" style="padding:15px;">
      <button type="submit" class="btn" style="background:#903479; color: #fff;">@lang('words.qa_search')</button>

    </div>

  </form>

  <table class="table">
    <thead>
      <tr>
        <th>@lang('words.trainers.fields.id')</th>
        <th>@lang('words.trainers.fields.fullname')</th>
        <th>@lang('words.trainers.fields.phone')</th>
        <th>@lang('words.qa_create_dateday')</th>
        <th>@lang('words.qa_edit')</th>
        <th>@lang('words.qa_delete')</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($trainers as $trainer)
      <tr>
        <td>{{ $trainer->id }}</td>
        <td>{{ $trainer->firstname }} {{ $trainer->lastname }}</td>
        <td>{{ $trainer->phone }}</td>
        <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.datedays.create' ) }}">@lang('words.qa_create_dateday')</a>
        </td>
       <td>
          <a type="submit" class="btn btn-sm btn-primary" href="{{route('admin.trainers.edit', $trainer->id ) }}">@lang('words.qa_edit') </a>
        </td> 
        <td>
                   <form action="{{route('admin.trainers.destroy', $trainer->id ) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-primary">@lang('words.qa_delete')</button>
                    </form>
          </td>
     
      </tr>
      @endforeach
    </tbody>
  </table>
  
  {{ $trainers->links() }}

</x-dashboard-layout>