@include('head.html')

<head>
	<title>: Dashboard</title>
	@include('head.meta')
	@include('head.css')
	@include('head.js')
	@include('head.other')
</head>

<body class="dashboard">
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<a title="Redirect back to business information" class="navbar-brand navbar-brand--logo" href="/admin">
						<img class="logo logo--small" alt="" src="">
					</a>
					<a title="Redirect back to business information" class="navbar-brand" href="/admin"></a>
			</div>
			<ul class="navbar-nav ml-auto">

			<li class="nav-item dropdown">

                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('locale.change', ['locale' => 'ar']) }}"><img src="{{asset('img/us.png')}}"> Arabic</a>
                            <a class="dropdown-item" href="{{ route('locale.change', ['locale' => 'he']) }}"><img src="{{asset('img/in.png')}}"> Hebron</a>
                        </div>
            </li>
			</ul>

				<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/admin">Logged in as</a></li>
					<li><a title="Logout Administrator" href="/logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li class="{{ Request::is('admin') ? 'active' : null }}"><a title="Show Business Information" href="/admin">البروفايل</a></li>
					<li class="{{ Request::is('admin/trainees') ? 'active' : null }}"><a title="Show open hours for the business" href="/admin/trainees">@lang('words.trainees.title')</a></li>
					<li class="{{ Request::is('admin/trainers') ? 'active' : null }}"><a title="Show all employees" href="/admin/trainers">@lang('words.trainers.title')</a></li>
					<li class="{{ Request::is('admin/datedays') ? 'active' : null }}"><a title="Show a roster" href="/admin/datedays">@lang('words.datedays.title')</a></li>
					<li class="{{ Request::is('admin/appointments') ? 'active' : null }}"><a title="Show activitites" href="/admin/appointments">@lang('words.appointments.title')</a></li>
					<li class="{{ Request::is('admin/finances') ? 'active' : null }}"><a title="Show a bookings" href="/admin/finances">@lang('words.finances.title')</a></li>
					<li class="{{ Request::is('admin/attendance') ? 'active' : null }}"><a title="Show a summary of bookings" href="/admin/attendance">@lang('words.attendance.title')</a></li>
					<li class="{{ Request::is('admin/report') ? 'active' : null }}"><a title="Show a history of bookings" href="/admin/report">@lang('words.report.title')</a></li>
					<li class="{{ Request::is('admin/history') ? 'active' : null }}"><a title="Show a history of bookings" href="/admin/history">التنبهات</a></li>
					<li class="{{ Request::is('admin/history') ? 'active' : null }}"><a title="Show a history of bookings" href="/admin/history">الرسائل</a></li>

				</ul>
				<footer class="dashboard">LCJJ Development Team</footer>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 dash">
				{{$slot}}
			</div>
		</div>
	</div>
</body>

</html>
