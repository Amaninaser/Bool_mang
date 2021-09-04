<div class="form-group mb-3">
    <label for="">Trainer_Name:</label>
    <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror">
        <option value="">Select Name</option>
        @foreach ($trainers as $trainer)
        <option value="{{ $trainer->id }}" @if($trainer->id == old('trainer_id', $trainer->trainer_id) ) selected @endif >{{ $trainer->firstname }}</option>
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
                <th>Day Avaliable</th>
                <th>Start_Time</th>
                <th>End_time</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="col-lg-10" class="">
                        <label><input type="checkbox" name="day[]" value="saturday"> saturday</label>
                        <label><input type="checkbox" name="day[]" value="sunday"> sunday</label>
                        <label><input type="checkbox" name="day[]" value="monday"> monday</label>
                        <label><input type="checkbox" name="day[]" value="tuesday"> tuesday</label>
                        <label><input type="checkbox" name="day[]" value="wednesday"> wednesday</label>
                        <label><input type="checkbox" name="day[]" value="thursday"> thursday</label>
                        <label><input type="checkbox" name="day[]" value="friday"> friday</label>
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
    <label for="">Date_Form:</label>
    <input type="date" name="date_from" value="{{ old('date_from', $dateday->date_from) }}" class="form-control @error('date_from') is-invalid @enderror">
    @error('date_from')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>

<div class="form-group mb-3">
    <label for=""> Date_To :</label>
    <input type="date" name="date_to" value="{{ old('date_to', $dateday->date_to) }}" class="form-control @error('date_to') is-invalid @enderror">
    @error('date_to')
    <p class="invalid-feedback"> {{ $message }} </p>
    @enderror
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
</div>