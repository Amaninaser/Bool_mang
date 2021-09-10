<div class="form-group mb-3">
<label for="">@lang('words.trainers.fields.fullname'):</label>
    <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror">
    <option value="">@lang('words.qa_select_trainer_name')</option>
        @foreach ($trainers as $trainer)
        <option value="{{ $trainer->id }}" @if($trainer->id == old('trainer_id', $appointments->trainer_id) ) selected @endif >{{ $trainer->firstname }}</option>
        @endforeach
    </select>
    @error('trainer_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
<label for="">@lang('words.trainees.fields.fullname'):</label>
    <select name="trainee_id" class="form-control @error('trainee_id') is-invalid @enderror">
    <option value="">@lang('words.qa_select_trainee_name')</option>
        @foreach ($trainees as $trainee)
        <option value="{{ $trainee->id }}" @if($trainee->id == old('trainee_id', $appointments->trainee_id) ) selected @endif >{{ $trainee->firstname }}</option>
        @endforeach
    </select>
    @error('trainee_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="Time_from">@lang('words.attendance.fields.Time_from') :</label>
    <input type="datetime" name="Time_from" value="{{ old('Time_from', $appointments->Time_from) }}" class="form-control @error('Time_from') is-invalid @enderror">
    @error('Time_from')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="Time_To">  @lang('words.attendance.fields.Time_To') :</label>
    <input type="datetime" name="Time_To" value="{{ old('Time_To', $appointments->Time_To) }}" class="form-control @error('Time_To') is-invalid @enderror">
    @error('Time_To')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
<label for="audience">@lang('words.attendance.title') :</label>   
    <div>
        <label><input type="radio" name="audience" value="presence" @if(old('audience', $appointments->audience) == 'presence' ) checked @endif>
        @lang('words.attendance.fields.presence')</label>
        <label><input type="radio" name="audience" value="absence" @if(old('audience', $appointments->audience) == 'absence' ) checked @endif>
        @lang('words.attendance.fields.absence')</label>
     
    </div>
    @error('audience')
    <p class="invalid-feedback d-block"> {{ $message }} </p>
    @enderror
</div>



<div class="form-group mb-3">
<label for="status">@lang('words.attendance.fields.status_type') :</label>
    <div>
        <label><input type="radio" name="status" value="Reserve" @if(old('status', $appointments->status) == 'Reserve' ) checked @endif>
        @lang('words.attendance.fields.Reserve')</label>
        <label><input type="radio" name="status" value="Complete" @if(old('status', $appointments->status) == 'Complete' ) checked @endif>
        @lang('words.attendance.fields.Complete')</label>
        <label><input type="radio" name="status" value="Cancel" @if(old('status', $appointments->status) == 'Cancel' ) checked @endif>
        @lang('words.attendance.fields.Cancel')</label>
     
    </div>
    @error('status')
    <p class="invalid-feedback d-block"> {{ $message }} </p>
    @enderror
</div>

<!-- 
<div class="form-group mb-3">
 <label for="details">  @lang('words.attendance.fields.details') :</label>
 <textarea name="details" class="form-control @error('details') is-invalid @enderror"> {{ old('details', $appointments->details) }} </textarea>

    @error('details')
    <p class="invaild-feedback text-red">{{ $message }}</p>
    @enderror
</div> -->



<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
</div>