
       
<div class="form-group mb-3">
    <label for="">إسم المتدرب:</label>
    <select name="trainee_id" class="form-control @error('trainee_id') is-invalid @enderror">
        <option value="">Select Name</option>
        @foreach ($trainees as $trainee)
        <option value="{{ $trainee->id }}" @if($trainee->id == old('trainee_id', $trainee->trainee_id) ) selected @endif >{{ $trainee->firstname }} {{ $trainee->lastname }}</option>
        @endforeach
    </select>
    @error('trainee_id')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>


<div class="form-group mb-3">
    <label for="">المبلغ المدفوع:</label>
    <input type="text" name="paid_money" value="{{ old('paid_money', $finance->paid_money) }}" class="form-control @error('paid_money') is-invalid @enderror">
    @error('paid_money')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>


<div class="form-group mb-3">
    <label for="">المبلغ المستحق:</label>
    <input type="text" name="owed_money" value="{{ old('owed_money', $finance->owed_money) }}" class="form-control @error('owed_money') is-invalid @enderror">
    @error('owed_money')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
</div>

