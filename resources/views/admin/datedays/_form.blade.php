<div class="form-group mb-3">
    <label for="">إسم المدرب:</label>
    <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror">
        <option value="">إختر إسم المدرب</option>
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
                <th>الأيام المتاحة</th>
                <th>من الساعة</th>
                <th>إلى الساعة</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="col-lg-10" class="">
                        <!-- @foreach ($dateday->daysname as $daysname)

                             <label><input type="checkbox" name="day[]" value="day[]" checked> {{ $daysname->day_name }}</label> 

                        @endforeach -->
                        <label><input type="checkbox" name="day[]" value="السبت"> السبت</label>
                        <label><input type="checkbox" name="day[]" value="الأحد"> الأحد</label>
                        <label><input type="checkbox" name="day[]" value="الإثنين"> الإثنين</label>
                        <label><input type="checkbox" name="day[]" value="الثلاثاء"> الثلاثاء</label>
                        <label><input type="checkbox" name="day[]" value="الأربعاء"> الأربعاء</label>
                        <label><input type="checkbox" name="day[]" value="الخميس"> الخميس</label>
                        <label><input type="checkbox" name="day[]" value="الجمعة"> الجمعة</label>
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
        <label for="">من تاريخ :</label>
        <input type="date" name="date_from" value="{{ old('date_from', $dateday->date_from) }}" class="form-control @error('date_from') is-invalid @enderror">
        @error('date_from')
        <p class="invalid-feedback"> {{ $message }} </p>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label for=""> إلى تاريخ :</label>
        <input type="date" name="date_to" value="{{ old('date_to', $dateday->date_to) }}" class="form-control @error('date_to') is-invalid @enderror">
        @error('date_to')
        <p class="invalid-feedback"> {{ $message }} </p>
        @enderror
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button_lable ?? 'Save'}}</button>
    </div>