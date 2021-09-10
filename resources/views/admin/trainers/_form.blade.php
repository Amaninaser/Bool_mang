<div class="form-group mb-3">
    <label for="">@lang('words.trainers.fields.firstname'):</label>
    <input type="text" name="firstname" value="{{ old('firstname', $trainer->firstname) }}" class="form-control @error('firstname') is-invalid @enderror">
    @error('firstname')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">@lang('words.trainers.fields.lastname'):</label>
    <input type="text" name="lastname" value="{{ old('lastname', $trainer->lastname) }}" class="form-control @error('lastname') is-invalid @enderror">
    @error('lastname')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>
<div class="form-group mb-3">
    <label for="">@lang('words.trainers.fields.phone'):</label>
    <input type="text" name="phone" value="{{ old('phone', $trainer->phone) }}" class="form-control @error('phone') is-invalid @enderror">
    @error('phone')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>


  

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
</div>

