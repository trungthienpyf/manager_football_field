@extends('user.layout.master')

@section('search')
    <div class="container">
        <h2 class="section-title" style="color:black;margin-top:0">Tìm kiếm</h2>
        <form action="" method="get">
            <div class="row" style="border: 1px solid #f9f9f9;box-shadow: #969ea633 0px 0px 24px;">
                <div class="col-md-2">
                    <div class="form-group" style="margin-top:15px">
                        <select name="area_id" id="" class="form-control">
                            <option value="" checked>Chọn khu vực</option>
                            @foreach($area as $each)
                            <option value="{{$each->id}}">{{$each->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2" style="margin-top:15px;padding:0 8px">
                    <input class="form-control" name="date_search" type="date" value="" min="{{date("Y-m-d")}}">
                </div>
                <div class="col-md-2" style="margin-top:15px;padding:0 8px">
                    <div class="input-group" >
                        <input class="form-control" id="time" name="time_start" placeholder="07:00">
                        <a class="input-group-addon" >
                            <i class="fa fa-clock-o"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2" style="margin-top:15px;padding:0 8px">
                    <div class="input-group" >
                        <input class="form-control" id="time" name="time_end" placeholder="23:00">
                        <a class="input-group-addon" >
                            <i class="fa fa-clock-o"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3"  style="margin-top:15px;padding:0 8px">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập tên sân..." name="search">
                        <a class="input-group-addon" >
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-1"  style="margin-top:13px;padding:0 ">
                    <button class="btn btn-social btn-fill btn-google" style="font-size:16px">
                       Tìm kiếm
                    </button>
                </div>
            </div>
        </form>
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
                                <a href="{{route('booking',$each)}}" type="button"
                                   class="btn btn-info btn-round btn-fill">
                                    <i class="fa fa-calendar-check-o"></i> Đặt lịch ngay
                                </a>
                            </div>
                        </div>
                        <div class="content">
                            <p class="category">News</p>
                            <a class="card-link" href="{{route('detail',$each)}}">
                                <h4 class="title">{{$each->name}} @if ($each->size==1)
                                       <span style="font-size:14px">
                                             ({{ $each->pitch->name }})
                                        </span>
                                                                      @endif
                                </h4>
                            </a>
                            <div class="footer">
                                <div class="author">
                                    <a class="card-link" href="#">

                                            <span
                                                style="font-size:14px;color:#a97373;text-transform: none;">  Số người: {{$each->namesize}} </span>
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
{{--        {{ $pitches->links() }}--}}
    </div>

@endsection


@push('scripts')

        <script>$.NotificationApp.send("Title","Your awesome message text","Position","Background color","Icon")</script>
@endpush
