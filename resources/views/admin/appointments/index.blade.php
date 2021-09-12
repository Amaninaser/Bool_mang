@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif


<!DOCTYPE html>
<html>

<head>
    <title>حجز مواعيد للمدربين</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<body>

    <div class="container">
        <h3>حجز مواعيد للمدربين</h3>
        <div id='calendar'></div>
    </div>

    <script>
        function convert(str) {
            var date = new Date(str),
                mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                day = ("0" + date.getDate()).slice(-2);
            return [date.getFullYear(), mnth, day].join("-");
        }

        $(document).ready(function() {

            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: SITEURL +"/admin/appointments",
                displayEventTime: true,
                editable: true,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var date = convert(start);
                    window.location = '/admin/appointments/create?date=' + date;
           
                    $.ajax({
                        url: "/admin/appointments/create",
                        type: "POST",
                      
                        data: {
                            start: start,
                            end: end,
                            title: title,
                            type: 'add',  

                        },                

                        success: function(data) {
                            alert("Appointment Created Successfully");
                        

                        calendar.fullCalendar('renderEvent',
                                        {
                                            id: data.id,
                                            title: title,
                                            start: start,
                                            end: end,
                                            allDay: allDay
                                        },true);
  
                                        calendar.fullCalendar('unselect');
                                    }
                    });

                },

                eventDrop: function(event, data) {
                    console.log(data._data);
                    $.ajax({
                        url: '/admin/appointments/edit',
                        data: {
                            id:event.id,
                            day:data._data.days,
                            months:data._data.months,
                            years:data._data.years,
                        },
                        type: "POST",
                        success: function(response) {
                            displayMessage("Event Updated Successfully");
                        }
                    });
                },

                eventClick: function (event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if(deleteMsg) {
                        $.ajax({
                            method: "GET",
                            url: '/appointments/delete?id='+event.id,
                            success: function (response) {
                                if(parseInt(response) > 0) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                    displayMessage("Deleted Successfully");
                                }
                            }
                        });
                    }
                },
            });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>

</body>

</html>
