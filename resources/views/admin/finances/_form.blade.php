
       
<div class="form-group mb-3">
<label for="">@lang('words.trainees.fields.fullname'):</label>
    <select name="trainee_id" class="form-control @error('trainee_id') is-invalid @enderror">
        <option value="">@lang('words.qa_select_trainee_name')</option>
        
        @foreach ($trainees as $trainee)
        <option value="{{ $trainee->id }}" @if($trainee->id == old('trainee_id', $finance->trainee_id) ) selected @endif >{{ $trainee->firstname }} {{ $trainee->lastname }}</option>
        @endforeach
    </select>
    @error('trainee_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>


<div class="form-group mb-3">
    <label for="">@lang('words.finances.fields.paid_money'):</label>
    <input type="text" name="paid_money" value="{{ old('paid_money', $finance->paid_money) }}" class="form-control @error('paid_money') is-invalid @enderror">
    @error('paid_money')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>


<div class="form-group mb-3">
    <label for="">@lang('words.finances.fields.owed_money'):</label>
    <input type="text" name="owed_money" value="{{ old('owed_money', $finance->owed_money) }}" class="form-control @error('owed_money') is-invalid @enderror">
    @error('owed_money')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
</div>

