@extends('user.layout.master')

@section('search')
    <div class="container">
        <h2 class="section-title" style="color:black;margin-top:0">Tìm kiếm</h2>
        <form action="" method="get" id="formSubmit" autocomplete="off">
            <div class="row" style="border: 1px solid #f9f9f9;box-shadow: #969ea633 0px 0px 24px;">
                <div class="col-md-2">
                    <div class="form-group" style="margin-top:15px">
                        <select name="area_id" id="" class="form-control">
                            <option value="" >Chọn khu vực</option>
                            @foreach($area as $each)
                            <option value="{{$each->id}}"
                                    @if($area_id==$each->id)
                                        selected
                                    @endif
                            >{{$each->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2" style="margin-top:15px;padding:0 8px">
                    <input class="form-control" name="date_search" type="date"
                           @if(!empty($dateSearch))
                           value="{{$dateSearch}}"
                           @endif

                           min="{{date("Y-m-d")}}">
                </div>
                <div class="col-md-2" style="margin-top:15px;padding:0 8px">
                    <div class="input-group" >
                        <input class="form-control timepicker1" id="time" name="time_start"
                               @if(!empty($timeStartSearch))
                               value="{{$timeStartSearch}}"
                               @endif
                               placeholder="07:00" >
                        <a class="input-group-addon" >
                            <i class="fa fa-clock-o"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2" style="margin-top:15px;padding:0 8px">
                    <div class="input-group" >
                        <input class="form-control timepicker2" id="time" name="time_end" placeholder="22:00"
                               @if(!empty($timeEndSearch))
                               value="{{$timeEndSearch}}"

                            @endif
                               disabled
                        >
                        <a class="input-group-addon" >
                            <i class="fa fa-clock-o"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3"  style="margin-top:15px;padding:0 8px">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nhập tên sân..." name="search"
                               @if(request()->search)
                                   value="{{request()->search}}"
                               @endif
                        >
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
        <h2 class="section-title" style="color:black">Sân bóng đá </h2>
        <div style="float:right;padding:24px 24px 0 0">

                <select name="sizeSearch" id="selectSize" form="formSubmit" style="height:30px">
                    <option value="">Loại sân</option>
                    @foreach($sizeSearch as $key=> $size)
                    <option value="{{$size}}"
                            @if(request()->sizeSearch==$size)
                                selected
                            @endif
                    >
                        {{$key}}
                    </option>
                    @endforeach
                </select>


        </div>
        <div class="row">
            @foreach ($pitches as $each)
                <div class="col-md-3">
                    <div class="card card-plain">
                        <div class="image"
                             style="background-image: url({{ url('/storage') }}/{{$each->img}}); background-position: center center; background-size: cover;">

                            <div class="filter filter-white">
                                <a href="{{route('booking',[$each,'dateSearch'=> $dateSearch, 'timeStartSearch'=>$timeStartSearch,'timeEndSearch'=>$timeEndSearch]) }}" type="button"
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
                                    Giá <span style="color:#FF3B30">{{$each->price_viet_nam}}₫</span>/Trận
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
        {{ $pitches->appends(request()->all())->links() }}
    </div>

@endsection


@push('scripts')

        <script>
            $('#selectSize').change(function () {
            $('#formSubmit').submit()
            })
            const timeStart = ["07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "18:00", "19:00", "20:00", "21:00"];
            const timeEnd = [ "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "18:00", "19:00", "20:00", "21:00", "22:00"];

            function changeOpenPicker(){

               let time= $(this).val()
                if(timeStart.includes(time)){
                    $('.timepicker2').prop("disabled", false);
                    let timeValid=time.slice(0,2)-0 +1
                    $('.timepicker2').timepicker('option', 'minTime' ,timeValid+'')


                }else{
                    $('.timepicker2').prop("disabled", true);
                }


            }

            $('.timepicker1').timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '7',
                maxTime: '21',


                dynamic: false,
                dropdown: true,
                scrollbar: true,
                change: changeOpenPicker
            });
            $('.timepicker2').timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '8',
                maxTime: '22',


                dynamic: false,
                dropdown: true,
                scrollbar: true
            });


        </script>
@endpush
