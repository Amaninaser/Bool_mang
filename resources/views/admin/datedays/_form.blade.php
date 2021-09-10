<div class="form-group mb-3">
    <label for="">@lang('words.trainers.fields.fullname'):</label>
    <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror">
        <option value="">@lang('words.qa_select_trainer_name')</option>
        @foreach ($trainers as $trainer)
        <option value="{{ $trainer->id }}" @if($trainer->id == old('trainer_id', $dateday->trainer_id) ) selected @endif >{{ $trainer->firstname }} {{ $trainer->lastname }}</option>
        @endforeach
    </select>
    @error('trainer_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <table class="table">
        <thead>
            <tr>
                <th>@lang('words.datedays.fields.daysname')</th>
                <th>@lang('words.datedays.fields.start_time')</th>
                <th>@lang('words.datedays.fields.end_time')</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="col-lg-10" class="">
                      
                        <label><input type="checkbox" name="day[]" value="Saturday"> @lang('words.datedays.fields.Saturday')</label>
                        <label><input type="checkbox" name="day[]" value="Sunday"> @lang('words.datedays.fields.Sunday')</label>
                        <label><input type="checkbox" name="day[]" value="Monday"> @lang('words.datedays.fields.Monday')</label>
                        <label><input type="checkbox" name="day[]" value="Tuesday"> @lang('words.datedays.fields.Tuesday')</label>
                        <label><input type="checkbox" name="day[]" value="Wednesday"> @lang('words.datedays.fields.Wednesday')</label>
                        <label><input type="checkbox" name="day[]" value="Thursday"> @lang('words.datedays.fields.Thursday')</label>
                        <label><input type="checkbox" name="day[]" value="Friday"> @lang('words.datedays.fields.Friday')</label>

                        @error('day')
                        <p class="invaild-feedback text-red">{{ $message }}</p>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="form-group mb-3">
                        <input type="time" name="start_time" value="{{ old('start_time', $dateday->start_time) }}" class="form-control @error('start_time') is-invalid @enderror">
                        @error('start_time')
                        <p class="invalid-feedback"> {{ $message }} </p>
                        @enderror
                    </div>
                </td>
                <td>
                    <div class="form-group mb-3">
                        <input type="time" name="end_time" value="{{ old('end_time', $dateday->end_time) }}" class="form-control @error('end_time') is-invalid @enderror">
                        @error('end_time')
                        <p class="invalid-feedback"> {{ $message }} </p>
                        @enderror
                    </div>

                </td>
            </tr>
        </tbody>
    </table>

    <div class="form-group mb-3">
        <label for="">@lang('words.datedays.fields.date_from') :</label>
        <input type="date" name="date_from" value="{{ old('date_from', $dateday->date_from) }}" class="form-control @error('date_from') is-invalid @enderror">
        @error('date_from')
        <p class="invalid-feedback"> {{ $message }} </p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for="">@lang('words.datedays.fields.date_to') :</label>
        <input type="date" name="date_to" value="{{ old('date_to', $dateday->date_to) }}" class="form-control @error('date_to') is-invalid @enderror">
        @error('date_to')
        <p class="invalid-feedback"> {{ $message }} </p>
        @enderror
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
    </div>