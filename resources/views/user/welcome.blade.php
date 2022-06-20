@extends('user.layout.master')

@section('content')



    <span>
    @foreach ($pitch as $each)
            <h1>{{$each->name}}</h1>
            <img src="{{ url('/storage') }}/{{$each->img}}" alt="">
            <p> Giá {{$each->price}}VNĐ</p>
            {{--                <a href="{{route('checkout',$each)}}">Đặt sân</a>--}}
            <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#signup-modal" onclick="selectId({{$each->id}})">Đặt sân</button>
        @endforeach
</span>
    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="text-center mt-2 ">
                        <h3>Thông tin đặt sân</h3>
                    </div>
                    <form class="pl-3 pr-3" action="#" id="form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ và tên (*)</label>
                            <input class="form-control" type="text" id="name"  name="name"
                                   placeholder="Họ và tên (bắt buộc)">
                        </div>
{{--                        <input type="hidden" id="get_id">--}}
                        <div class="form-group">
                            <label for="phone">Số điện thoại (*)</label>
                            <input class="form-control" type="number" id="phone"  name="phone"
                                   placeholder="Số điện thoại (bắt buộc)" >
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="datetime">Thời gian bắt đầu</label>
                                <input class="form-control" type="datetime-local"
                                       name="time_receive"
                                       value="{{date ('Y-m-d\TH:i')}}" placeholder=""
                                >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="datetimepicker">Thời gian kết thúc</label>
                                <input class="form-control" type="datetime-local"
                                       value="{{date ('Y-m-d\TH:i',strtotime('+1 hours'))}}"
                                       name="time_end"
                                       />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email"
                                   placeholder="Điền email để nhận hóa đơn">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" id="checkout_submit">Đặt sân</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@push('scripts')
    <script>



        function selectId(id){
           // $('#get_id').attr('value', id)

            $('#form').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/checkout/' + id,
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {

                    }
                })
            })
        }

    </script>
    {{--    <script>$.NotificationApp.send("Title","Your awesome message text","Position","Background color","Icon")</script>--}}
@endpush
