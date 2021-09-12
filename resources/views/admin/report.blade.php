<x-dashboard-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

    </script>


    <div class="container">
        <br />

        <h1 class="text-center text-primary">@lang('words.report.fields.report_status')</h1>
        <br />

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('words.trainees.fields.fullname')</th>
                        <th>@lang('words.report.fields.status_Complete')</th>
                        <th>@lang('words.report.fields.status_Reserve')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    @php($complete = App\Models\Appointment::where('trainee_id','=', $row->id)
                    ->where('status','=','Complete')->count())

                    @php($reserve= App\Models\Appointment::where('trainee_id','=', $row->id)
                    ->where('status','=','Reserve')->count())
                    <tr>
                        <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                        <td>
                            {{$complete}}
                        </td>
                        <td> {{$reserve}} </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="container">
        <br />
        <h1 class="text-center text-primary">@lang('words.report.fields.report_status_cancel')</h1>
        <br />
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('words.trainees.fields.fullname')</th>
                        <th>@lang('words.report.fields.status_Canceled')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        @php($cancel = App\Models\Appointment::where('trainee_id','=', $row->id)
                        ->where('status','=','Cancel')->count())
                        <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                        <td>{{ $cancel }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <br />
        <h1 class="text-center text-primary">@lang('words.report.fields.report_presence')</h1>
        <br />
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('words.trainees.fields.fullname')</th>
                        <th>@lang('words.report.fields.presence')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        @php($presence = App\Models\Appointment::where('trainee_id','=', $row->id)
                        ->where('audience','=','presence')->count())
                        <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                        <td>{{ $presence }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="container">
        <br />
        <h1 class="text-center text-primary">@lang('words.report.fields.report_Finance_owed')</h1>
        <br />
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('words.trainees.fields.fullname')</th>
                        <th>@lang('words.report.fields.report_owed_money')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sum as $row)
                    <tr>
                    <td>{{ $row->firstname }} {{ $row->lastname }}</td>

                        <td>
                            {{$row->sum_owed}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <br />
        <h1 class="text-center text-primary">@lang('words.report.fields.report_Finance')</h1>
        <br />
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('words.trainees.fields.fullname')</th>
                        <th>@lang('words.report.fields.report_paid_money')</th>
                        <th>@lang('words.report.fields.report_owed_money')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sum as $row)
                    <tr>

                        <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                        <td>{{ $row->sum_paid }}</td>
                        <td>{{ $row->sum_owed }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>