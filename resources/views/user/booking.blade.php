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

                </div> <!-- Acordeon  -->
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
                                    <input type="text" name="name_receive" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6" style="">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12" style="">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại (*)</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6" style="">
                                <div class="form-group">
                                    <label for="date-start">Chọn thời gian nhận sân</label>
                                    <input type="datetime-local" name="time_start" class="form-control"  value="{{date('Y-m-d\TH:i:sP')}}" min="{{date('y-m-d')}}T00:00" max="">
                                </div>
                            </div>
                            <div class="col-md-6" style="">
                                <div class="form-group">
                                    <label for="date-end">Chọn chọn thời gian trả</label>
                                    <input type="datetime-local"  name="time_end" class="form-control">
                                </div>
                            </div>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapseFour" class="" aria-expanded="true">
                                                Default Collapsible Item 1
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse in" aria-expanded="true" style="">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Acordeon  -->
                            <div class="col-md-6">
                                <button  class="btn btn-block btn-lg btn-fill btn-info">Đặt sân</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>


    </script>
@endpush
