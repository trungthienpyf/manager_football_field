@extends('user.layout.master')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-7">
                <div class="tab-content">
                    <div class="tab-pane active" id="product-page1">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="640 px">
                    </div>
                    <div class="tab-pane" id="product-page2">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="640 px">
                    </div>
                    <div class="tab-pane" id="product-page3">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="640 px">
                    </div>
                    <div class="tab-pane" id="product-page4">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="640 px">
                    </div>
                    <div class="tab-pane" id="product-page5">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="640 px">
                    </div>
                    <div class="tab-pane" id="product-page6">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="640 px">
                    </div>
                </div>
                <div class="nbs-flexisel-container">
                    <div class="nbs-flexisel-inner">
                        <ul class="nav nav-text nbs-flexisel-ul" role="tablist" id="flexiselDemo1"
                            style="left: -113.75px;">
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page6" role="tab" data-toggle="tab" aria-expanded="true">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="active nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page1" role="tab" data-toggle="tab" aria-expanded="false">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page2" role="tab" data-toggle="tab" aria-expanded="false">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page3" role="tab" data-toggle="tab" aria-expanded="false">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page4" role="tab" data-toggle="tab" aria-expanded="true">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page5" role="tab" data-toggle="tab" aria-expanded="true">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page6" role="tab" data-toggle="tab" aria-expanded="true">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="active nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page1" role="tab" data-toggle="tab" aria-expanded="false">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page2" role="tab" data-toggle="tab" aria-expanded="false">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page3" role="tab" data-toggle="tab" aria-expanded="false">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page4" role="tab" data-toggle="tab" aria-expanded="true">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                            <li class="nbs-flexisel-item" style="width: 113.75px;">
                                <a href="#product-page5" role="tab" data-toggle="tab" aria-expanded="true">
                                    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="...">
                                </a>
                            </li>
                        </ul>
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

                    <span class="price">€ 1,930</span>
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
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Delivery &amp; Return
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingFour">
                            <div class="panel-body">
                                Find out more about our delivery options
                                Please try items in the comfort of your own home. If you don't like them, or they don't
                                fit, we'll happily collect them from your home or office for free.
                            </div>
                        </div>
                    </div>
                </div> <!-- Acordeon  -->
            </div>
            <div class="col-md-5">
                <div class="product-details">
                    <a href="">
                        <h2 style="color:black">Đặt sân qua các kênh sau</h2>
                    </a>
                    <p class="description">
                        Brown single-breasted brushed-wool checked blazer
                    </p>

                </div>
                <div class="social-line">
                    <a href="{{ route('booking',$pitch) }}" class="btn btn-fill btn-social" style="font-size:20px;background-color:#dd4b39;border:0">
                       Đặt sân ngay
                    </a>
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
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Delivery &amp; Return
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingFour">
                            <div class="panel-body">
                                Find out more about our delivery options
                                Please try items in the comfort of your own home. If you don't like them, or they don't
                                fit, we'll happily collect them from your home or office for free.
                            </div>
                        </div>
                    </div>
                </div> <!-- Acordeon  -->
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(window).load(function () {
            $("#flexiselDemo1").flexisel({
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 3
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 3
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });


            $("#flexiselDemo2").flexisel({
                enableResponsiveBreakpoints: true,
                visibleItems: 6,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });
        });
    </script>
@endpush
