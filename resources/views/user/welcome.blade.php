@extends('user.layout.master')

@section('content')

    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    <div class="text-center mt-2 mb-4">
                        <h3>Thông tin đặt sân</h3>

                    </div>

                    <form class="pl-3 pr-3" action="#">

                        <div class="form-group">
                            <label for="name">Họ và tên (*)</label>
                            <input class="form-control" type="name" id="name" required="" placeholder="Họ và tên (bắt buộc)">
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại (*)</label>
                            <input class="form-control" type="number" id="phone" required="" placeholder="Số điện thoại (bắt buộc)">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" id="email" placeholder="Điền email để nhận hóa đơn">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input class="form-control" type="text" required="" id="address"
                                   placeholder="(Không bắt buộc)">
                        </div>



                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="button">Đặt sân</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <span>
    @foreach ($pitch as $each)
                <h1>{{$each->name}}</h1>
                <img src="{{ url('/storage') }}/{{$each->img}}" alt="">
                <p> Giá {{$each->price}}VNĐ</p>
{{--                <a href="{{route('checkout',$each)}}">Đặt sân</a>--}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal">Đặt sân</button>
            @endforeach
</span>


@endsection
@push('scripts')
{{--    <script>$.NotificationApp.send("Title","Your awesome message text","Position","Background color","Icon")</script>--}}
    @endpush
