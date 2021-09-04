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
				@php
					// Dynamic page titles
					$title = ": ";

					// Check url for title
					if (Request::is('admin')) {
						$title .= "البروفايل";
					}
				
					elseif (Request::is('admin/times')) {
						$title .= "المتدربين";
					}
					elseif (Request::is('admin/history')) {
						$title .= "المدربين";
					}
					elseif (Request::is('admin/employees')) {
						$title .= "مواعيد العمل";
					}
					elseif (Request::is('admin/activity')) {
						$title .= "حجز أدوار";
					}
					elseif (Request::is('admin/booking')) {
						$title .= "المالية";
					}
					elseif (Request::is('admin/roster/*')) {
						$title .= "التنبهات";
					}
					elseif( Request::is('admin/employees/assign')) {
						$title .= "كشف الحضور ";
					}
					else {
						// Else default
						$title = "";
					}
				@endphp
					<a title="Redirect back to business information" class="navbar-brand navbar-brand--logo" href="/admin">
						<img class="logo logo--small" alt="" src="">
					</a>
					<a title="Redirect back to business information" class="navbar-brand" href="/admin"></a>
			</div>
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
					<li class="{{ Request::is('admin/trainees') ? 'active' : null }}"><a title="Show open hours for the business" href="/admin/trainees">المشاركين</a></li>
					<li class="{{ Request::is('admin/trainers') ? 'active' : null }}"><a title="Show all employees" href="/admin/trainers">المدربين</a></li>
					<li class="{{ Request::is('admin/datedays') ? 'active' : null }}"><a title="Show a roster" href="/admin/datedays">مواعيد العمل</a></li>
					<li class="{{ Request::is('admin/activity') ? 'active' : null }}"><a title="Show activitites" href="/admin/activity">حجز موعد</a></li>
					<li class="{{ Request::is('admin/finances') ? 'active' : null }}"><a title="Show a bookings" href="/admin/finances">المالية</a></li>
					<li class="{{ Request::is('admin/summary') ? 'active' : null }}"><a title="Show a summary of bookings" href="/admin/summary">كشف حضور</a></li>
					<li class="{{ Request::is('admin/history') ? 'active' : null }}"><a title="Show a history of bookings" href="/admin/history">التنبهات</a></li>
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
