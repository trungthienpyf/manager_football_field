@extends('user.layout.master')

@section('search')
    <div class="container">
        <div class="row" style="border: 1px solid #f9f9f9;box-shadow: #969ea633 0px 0px 24px;">
            <div class="col-sm-3">
                <div class="form-group" style="margin-top:15px">
                    <select name="" id="" class="form-control">
                        <option value="">Chọn khu vực</option>
                        <option value="">Chọn khu vực</option>
                        <option value="">Chọn khu vực</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3" style="margin-top:15px" >
                <input class="form-control"  id="datetimepicker">
            </div>
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div class="col-sm-3">
                <div class="form-group" style="margin-top:15px">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <h2 class="section-title" style="color:black">Sân bóng đá</h2>
        <div class="row">
            @foreach ($pitches as $each)
                <div class="col-md-3">
                    <div class="card card-plain">
                        <div class="image"
                             style="background-image: url({{ url('/storage') }}/{{$each->img}}); background-position: center center; background-size: cover;">

                            <div class="filter filter-white">
                                <a href="{{route('detail',$each)}}" type="button"
                                   class="btn btn-info btn-round btn-fill">
                                    <i class="fa fa-heart"></i> Đặt sân
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <p class="category">News</p>
                            <a class="card-link" href="#">
                                <h4 class="title">Get Shit Done Kit PRO, the most wanted bootstrap kit is here
                                    and... </h4>
                            </a>
                            <div class="footer">
                                <div class="author">
                                    <a class="card-link" href="#">

                                            <span
                                                style="font-size:14px;color:#a97373;text-transform: none;">  Số người: {{$each->size}} </span>
                                    </a>
                                </div>
                                <div class="stats pull-right">
                                    Giá <span style="color:#FF3B30">{{$each->price}}₫</span>/Trận
                                </div>
                            </div>
                            <div class="footer">
                                <div class="author">
                                    <a class="card-link" href="#">

                                        <span style="font-size:14px"> Wifi<i class="fa fa-check">  </i> </span>
                                    </a>
                                </div>
                                <div class="stats pull-right">
                                    Giữ xe<i class="fa fa-check"> </i>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card -->
                </div>
            @endforeach
        </div>
    </div>
    <div style="display:flex; justify-content:center">
        {{ $pitches->links() }}
    </div>

@endsection









@push('scripts')
    <script>

    $('#datetimepicker').datetimepicker()
    $('#datetimepicker1').datetimepicker()

    </script>
    {{--    <script>$.NotificationApp.send("Title","Your awesome message text","Position","Background color","Icon")</script>--}}
@endpush
