<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.firstname'):</label>
    <input type="text" name="firstname" value="{{ old('firstname', $trainee->firstname) }}" class="form-control @error('firstname') is-invalid @enderror">
    @error('firstname')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.lastname'):</label>
    <input type="text" name="lastname" value="{{ old('lastname', $trainee->lastname) }}" class="form-control @error('lastname') is-invalid @enderror">
    @error('lastname')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>



<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.town'):</label>
    <input type="text" name="town" value="{{ old('town', $trainee->town) }}" class="form-control @error('town') is-invalid @enderror">
    @error('town')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>


<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.no_id'):</label>
    <input type="text" name="no_id" value="{{ old('no_id', $trainee->no_id) }}" class="form-control @error('no_id') is-invalid @enderror">
    @error('no_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.phone'):</label>
    <input type="text" name="phone" value="{{ old('phone', $trainee->phone) }}" class="form-control @error('phone') is-invalid @enderror">
    @error('phone')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.parent_phone'):</label>
    <input type="text" name="parent_phone" value="{{ old('parent_phone', $trainee->parent_phone) }}" class="form-control @error('parent_phone') is-invalid @enderror">
    @error('parent_phone')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div> 
       
<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.trainer_id'):</label>
    <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror">
        <option value="">Select Name</option>
        @foreach ($trainers as $trainer)
        <option value="{{ $trainer->id }}" @if($trainer->id == old('trainer_id', $trainee->trainer_id) ) selected @endif >{{ $trainer->firstname }} {{ $trainer->lastname }}</option>
        @endforeach
    </select>
    @error('trainer_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>



<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.Subtype'):</label>
    <div>
        <label><input type="radio" name="Subtype" onclick="javascript:subtypeCheck();"  id="trainCheck" value="training" @if(old('Subtype', $trainee->Subtype) == 'training' ) checked @endif>
        @lang('words.trainees.fields.training')</label>

        <label><input type="radio" name="Subtype" onclick="javascript:subtypeCheck();"  id="lessonCheck" value="private_lesson" @if(old('Subtype', $trainee->Subtype) == 'private_lesson' ) checked @endif>
        @lang('words.trainees.fields.private_lesson')</label>

        <label><input type="radio" name="Subtype"  onclick="javascript:subtypeCheck();"  id="educateCheck"  value="education" @if(old('Subtype', $trainee->Subtype) == 'education' ) checked @endif>
        @lang('words.trainees.fields.education')</label>

    </div>
    @error('Subtype')
    <p class="invalid-feedback d-block"> {{ $message }} </p>
    @enderror
</div>

<div id="ifselected" style="display:none">
       
<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.number_of_lessons'):</label>
    <input type="text" name="number_of_lessons" value="{{ old('number_of_lessons', $trainee->number_of_lessons) }}" class="form-control @error('number_of_lessons') is-invalid @enderror">
    @error('number_of_lessons')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">@lang('words.trainees.fields.lesson_price'):</label>
    <input type="text" name="lesson_price" value="{{ old('lesson_price', $trainee->lesson_price) }}" class="form-control @error('lesson_price') is-invalid @enderror">
    @error('lesson_price')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
</div>

<script type="text/javascript">

function subtypeCheck() {
    if (document.getElementById('educateCheck').checked || document.getElementById('trainCheck').checked) {
        document.getElementById('ifselected').style.display = 'block';
    }
    else document.getElementById('ifselected').style.display = 'none';

}

</script>