<div class="form-group mb-3">
    <label for="">إسم المدرب :</label>
    <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror">
        <option value="">Select Name</option>
        @foreach ($trainers as $trainer)
        <option value="{{ $trainer->id }}" @if($trainer->id == old('trainer_id', $appointments->trainer_id) ) selected @endif >{{ $trainer->firstname }}</option>
        @endforeach
    </select>
    @error('trainer_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">إسم المتدرب :</label>
    <select name="trainee_id" class="form-control @error('trainee_id') is-invalid @enderror">
        <option value="">Select Name</option>
        @foreach ($trainees as $trainee)
        <option value="{{ $trainee->id }}" @if($trainee->id == old('trainee_id', $appointments->trainee_id) ) selected @endif >{{ $trainee->firstname }}</option>
        @endforeach
    </select>
    @error('trainee_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="Time_from">من الساعة :</label>
    <input type="datetime" name="Time_from" value="{{ old('Time_from', $appointments->Time_from) }}" class="form-control @error('Time_from') is-invalid @enderror">
    @error('Time_from')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="Time_To"> إلى الساعة :</label>
    <input type="datetime" name="Time_To" value="{{ old('Time_To', $appointments->Time_To) }}" class="form-control @error('Time_To') is-invalid @enderror">
    @error('Time_To')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
<label for="audience">السجل الحضوري:</label>   
    <div>
        <label><input type="radio" name="audience" value="حضور" @if(old('audience', $appointments->audience) == 'حضور' ) checked @endif>
        حضور</label>
        <label><input type="radio" name="audience" value="غياب" @if(old('audience', $appointments->audience) == 'غياب' ) checked @endif>
        غياب</label>
     
    </div>
    @error('audience')
    <p class="invalid-feedback d-block"> {{ $message }} </p>
    @enderror
</div>



<div class="form-group mb-3">
<label for="status">نوع الحالة :</label>
    <div>
        <label><input type="radio" name="status" value="حجز" @if(old('status', $appointments->status) == 'حجز' ) checked @endif>
        حجز</label>
        <label><input type="radio" name="status" value="إكتمال" @if(old('status', $appointments->status) == 'إكتمال' ) checked @endif>
        إكتمال</label>
        <label><input type="radio" name="status" value="إلغاء" @if(old('status', $appointments->status) == 'إلغاء' ) checked @endif>
        إلغاء</label>
     
    </div>
    @error('status')
    <p class="invalid-feedback d-block"> {{ $message }} </p>
    @enderror
</div>



<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
</div>