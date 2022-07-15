@extends('user.layout.master')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="product-page1" style="    text-align: center;">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 30% ">
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="product-details">
                    <a href="#">
                        <h3 class="title">Kingsman</h3>
                    </a>
                    <p class="description">
                        Brown single-breasted brushed-wool checked blazer
                    </p>

                    <span class="price">{{$pitch->price}}₫/Giờ</span>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    Product Description
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
                                Immaculately crafted in England using wool from esteemed British cloth house Dormeuile,
                                this Kingsman blazer typifies the line's uncompromising luxury. The dashing check, high
                                armholes and trim silhouette exudes timeless elegance. Keep your look modern by wearing
                                it over a cashmere cardigan and add a little flair with a silk pocket square. This item
                                is small to size, take the next size up. Shown here with a Kingman shirt, cardigan,
                                trousers, tie, pocket square, cufflinks and shoes. Designer exclusively for MR PORTER
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                   aria-expanded="false" aria-controls="collapseTwo">
                                    Size &amp; Fit
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <ul style="padding-left: 20px;">
                                    <li style="list-style-position: outside;"> Fits small to size</li>
                                    <li style="list-style-position: outside;"> Model wears a UK 40R</li>
                                    <li style="list-style-position: outside;"> Model measures: chest 39"/ 99cm, height
                                        6'1"/ 185cm
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Details
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="panel-body">
                                85% wool, 15% linen. Dry-clean only
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2 style="color:black;margin-top: 0">Đặt lịch hẹn</h2>
                <div class="product-details">
                    <div class="row">
                        <form action="{{route('pending',$pitch)}}" method="post">
                            @csrf
                            <div class="col-md-6" style="">
                                <div class="form-group">
                                    <label for="name_receive">Họ và tên (*)</label>

                                    <input type="text" name="name_receive" class="form-control" value="{{old('name_receive')}}">

                                </div>

                            </div>
                            <div class="col-md-6" style="">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại (*)</label>
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                </div>
                            </div>
                            <div class="col-md-6" style="">
                                <div class="form-group">
                                    <label for="date-start">Ngày đá</label>
                                    <input id="check-date" type="date" name="date" class="form-control"
                                           @if(empty(old('date')))
                                           value="{{date("Y-m-d")}}"
                                           @endif
                                           @if(!empty('date'))
                                           value="{{old('date')}}"
                                           @endif
                                        min="{{date('Y-m-d')}}"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6" style="">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapseFour" class=""
                                               aria-expanded="true">
                                                <i class="fa fa-clock-o"></i> Giờ đá
                                            </a>
                                        </h4>
                                    </div>

                                    <div id="collapseFour" class="panel-collapse collapse in" aria-expanded="true"
                                         style="">
                                        <div class="panel-body">
                                            <div class="selector">
                                                @foreach ($time as $hours)
                                                    <div class="selecotr-item">
                                                        <input type="radio" id="radio{{$hours->id}}" name="selector"
                                                               class="selector-item_radio" value="{{$hours->id}}"
                                                               @if( in_array($hours->time_start . $hours->time_end ,$arrCheck))
                                                               disabled
                                                            @endif
                                                               @if( in_array($hours->time_start . $hours->time_end ,$arrGetTime))
                                                               disabled
                                                            @endif
                                                        >
                                                        <label
                                                            for="radio{{$hours->id}}" class="selector-item_label"
                                                            @if( in_array($hours->time_start . $hours->time_end ,$arrCheck))
                                                            style="opacity:0.36;pointer-events:none"
                                                            @endif
                                                            @if( in_array($hours->time_start . $hours->time_end ,$arrGetTime))
                                                            style="opacity:0.36;pointer-events:none"
                                                            @endif
                                                        >{{$hours->time_start}} - {{$hours->time_end}}</label>

                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{--                                <div class="panel panel-default">--}}
                                {{--                                    <div class="panel-heading">--}}
                                {{--                                        <h4 class="panel-title">--}}
                                {{--                                            <a data-toggle="collapse" href="#collapseFive" class="" aria-expanded="true">--}}
                                {{--                                                <i class="fa fa-moon-o"></i> Buổi tối--}}
                                {{--                                            </a>--}}
                                {{--                                        </h4>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div id="collapseFive" class="panel-collapse collapse " aria-expanded="true" style="">--}}
                                {{--                                        <div class="panel-body">--}}
                                {{--                                            <div class="selector">--}}
                                {{--                                                <div class="selecotr-item">--}}
                                {{--                                                    <input type="radio" id="radio5" name="selector" class="selector-item_radio"  value="16:00:00 - 17:00:00">--}}
                                {{--                                                    <label for="radio5" class="selector-item_label">16:00 - 17:00</label>--}}
                                {{--                                                </div>--}}
                                {{--                                                <div class="selecotr-item">--}}
                                {{--                                                    <input type="radio" id="radio6" name="selector" class="selector-item_radio">--}}
                                {{--                                                    <label for="radio6" class="selector-item_label">17:00 - 18:00</label>--}}
                                {{--                                                </div>--}}
                                {{--                                                <div class="selecotr-item">--}}
                                {{--                                                    <input type="radio" id="radio7" name="selector" class="selector-item_radio">--}}
                                {{--                                                    <label for="radio7" class="selector-item_label">18:00 - 19:00</label>--}}
                                {{--                                                </div>--}}
                                {{--                                                <div class="selecotr-item">--}}
                                {{--                                                    <input type="radio" id="radio8" name="selector" class="selector-item_radio">--}}
                                {{--                                                    <label for="radio8" class="selector-item_label">20:00 - 21:00</label>--}}
                                {{--                                                </div>--}}
                                {{--                                                <div class="selecotr-item">--}}
                                {{--                                                    <input type="radio" id="radio9" name="selector" class="selector-item_radio" value="20:00:00 - 21:00:00">--}}
                                {{--                                                    <label for="radio9" class="selector-item_label">21:00 - 22:00</label>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}

                                {{--                                </div>--}}
                            </div> <!-- Acordeon  -->
                            <div class="col-md-6">
                                <button class="btn btn-block btn-lg btn-fill btn-info">Đặt sân</button>
                            </div>
                        </form>

                    </div>

                    @if (session()->has('msg'))
                        <div class="alert alert-danger">
                            <ul style="list-style-type: none!important">

                                <li>{{ session('msg') }}</li>

                            </ul>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        let errorName=''
        let errorDate=''
        let errorPhone=''
        let errorSelectTime=''
        @if ($errors->has('name_receive'))
             errorName= '{{$errors->first('name_receive')}}' ;
        toastr.error(errorName)
            @endif
            @if ($errors->has('phone'))
         errorPhone= '{{$errors->first('phone')}}' ;
        toastr.error(errorPhone)
        @endif
            @if ($errors->has('date'))
         errorDate= '{{$errors->first('date')}}' ;
        toastr.error(errorDate)
        @endif
            @if ($errors->has('selector'))
            errorSelectTime= '{{$errors->first('selector')}}' ;
        toastr.error(errorSelectTime)
        @endif
                console.log(errorName,errorPhone,errorDate,errorSelectTime)
        toastr.options.timeOut = 10000
        toastr.options.closeButton = true
        $('#check-date').change(function () {

            $.ajax({
                url: '{{ route('api.check_time') }}',
                type: 'post',
                data: {val: $(this).val(),id:{{$pitch->id}}},
                success: function (response) {
                    console.log(response)

                    $(".selecotr-item").replaceWith('')
                    response.data.forEach(function (each) {
                        let checkTimeBooking=response.arrCheck.includes(""+each.time_start+each.time_end)
                        let checkTimeOver=response.arrGetTime.includes(""+each.time_start+each.time_end)

                            $(".selector").append(
                    `<div class="selecotr-item">
                    <input type="radio" id="radio${each.id}"name="selector" class="selector-item_radio"  value="${each.id}"
                       ${checkTimeBooking ? 'disabled' : ''} ${checkTimeOver ? 'disabled' : ''}
                    >
                        <label for="radio${each.id}" class="selector-item_label" ${checkTimeOver ? "style='opacity:0.36;pointer-events:none'" : ''} ${checkTimeBooking ? "style='opacity:0.36;pointer-events:none'" : ''}>${each.time_start} - ${each.time_end}</label>
                    </div>`)
                        }
                    )

                }
            })

        })

    </script>
@endpush
