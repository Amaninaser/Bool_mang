<div class="form-group mb-3">
    <label for="">الإسم الأول:</label>
    <input type="text" name="firstname" value="{{ old('firstname', $trainee->firstname) }}" class="form-control @error('firstname') is-invalid @enderror">
    @error('firstname')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">الإسم العائلة:</label>
    <input type="text" name="lastname" value="{{ old('lastname', $trainee->lastname) }}" class="form-control @error('lastname') is-invalid @enderror">
    @error('lastname')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>



<div class="form-group mb-3">
    <label for="">البلدة:</label>
    <input type="text" name="town" value="{{ old('town', $trainee->town) }}" class="form-control @error('town') is-invalid @enderror">
    @error('town')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>


<div class="form-group mb-3">
    <label for="">رقم الهوية:</label>
    <input type="text" name="no_id" value="{{ old('no_id', $trainee->no_id) }}" class="form-control @error('no_id') is-invalid @enderror">
    @error('no_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">الهاتف:</label>
    <input type="text" name="phone" value="{{ old('phone', $trainee->phone) }}" class="form-control @error('phone') is-invalid @enderror">
    @error('phone')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">هاتف الأهل:</label>
    <input type="text" name="parent_phone" value="{{ old('parent_phone', $trainee->parent_phone) }}" class="form-control @error('parent_phone') is-invalid @enderror">
    @error('parent_phone')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div> 
       
<div class="form-group mb-3">
    <label for="">إسم المدرب:</label>
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
    <label for="">نوع الإشتراك:</label>
    <div>
        <label><input type="radio" name="Subtype" onclick="javascript:subtypeCheck();"  id="trainCheck" value="تدريب" @if(old('Subtype', $trainee->Subtype) == 'تدريب' ) checked @endif>
            تدريب</label>

        <label><input type="radio" name="Subtype" onclick="javascript:subtypeCheck();"  id="lessonCheck" value="درس خصوصي" @if(old('Subtype', $trainee->Subtype) == 'درس خصوصي' ) checked @endif>
            درس خصوصي</label>

        <label><input type="radio" name="Subtype"  onclick="javascript:subtypeCheck();"  id="educateCheck"  value="تعليم" @if(old('Subtype', $trainee->Subtype) == 'تعليم' ) checked @endif>
            تعليم</label>

    </div>
    @error('Subtype')
    <p class="invalid-feedback d-block"> {{ $message }} </p>
    @enderror
</div>

<div id="ifselected" style="display:none">
       
<div class="form-group mb-3">
    <label for="">عدد الدروس:</label>
    <input type="text" name="number_of_lessons" value="{{ old('number_of_lessons', $trainee->number_of_lessons) }}" class="form-control @error('number_of_lessons') is-invalid @enderror">
    @error('number_of_lessons')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="">سعر الدرس:</label>
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