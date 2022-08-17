<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.css' rel='stylesheet' />

    <style>  #calendar {
            max-width: 1100px;
            margin: 40px auto;
        }</style>
</head>
<body>
        <div id="calendar">test</div>
</body>
<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js'></script>
<script>
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {

        headerToolbar: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay',
            center: 'title',

        },
        events: [
            { // this object will be "parsed" into an Event Object
                title: 'The Title', // a property!
                start: '2022-08-16T23:59:59', // a property!
                end: '2022-08-16T23:59:59' // a property! ** see important note below about 'end' **
            }
        ],
        timeZone: 'UTC',



    });
    calendar.setOption('locale', 'vi')
    calendar.render();

</script>
</html>
