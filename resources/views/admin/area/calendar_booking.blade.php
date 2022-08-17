@extends('admin.layout.master')
@section('content')
    <style>
        #calendar {
            max-width: 1000px;
            margin: 40px auto;
            background-color: #fff;
            border-top: 4px solid #fac863;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('admin.area.show',$id)}}">
                        <h3> <i class="dripicons-backspace"></i> Quay lại </h3>
                    </a>
                </div>
                <h4 class="page-title">Chi tiết khu vực
                    <a href="{{route('admin.area.edit',$id)}}">
                        {{$titleArea->name}}
                    </a>
                </h4>
            </div>

        </div>
    </div>
    <div id="calendar"></div>


@endsection
@push('scripts')
    <script>
        var calendarEl = document.getElementById('calendar');
        $.ajax({
            url: '{{route('api.getDataForArea')}}',
            type: 'post',
            data: {id: '{{$id}}'},
            success: function (response) {

                console.log(response.data)

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    height: 1350,

                    eventMaxStack: true,
                    expandRows: true,
                    headerToolbar: {
                        left: 'dayGridMonth,timeGridWeek,timeGridDay',
                        center: 'title',

                    },
                    events: response.data,
                    timeZone: 'UTC',


                });
                calendar.setOption('locale', 'vi')
                calendar.updateSize()
                calendar.render();
            }
        })


    </script>
@endpush
