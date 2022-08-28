@extends('user.layout.master')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <div class="tab-content">
                    <div class="tab-pane active" id="product-page1">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="540 px">
                    </div>
                    <div class="tab-pane" id="product-page2">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="540 px">
                    </div>
                    <div class="tab-pane" id="product-page3">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="540 px">
                    </div>
                    <div class="tab-pane" id="product-page4">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="540 px">
                    </div>
                    <div class="tab-pane" id="product-page5">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="540 px">
                    </div>
                    <div class="tab-pane" id="product-page6">
                        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="..." height=" 360px " width="540 px">
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
                        <h3 class="title">Sân bóng đá cỏ nhân tạo {{$pitch->name}}</h3>
                    </a>
                    <p class="description">
                        <i class="fa fa-map-marker" aria-hidden="true"></i> 399/45 Bình Thành , Khu phố 2 , P. Bình Hưng
                        Hoà B, Quận Bình Tân, Tp Hồ Chí Minh
                    </p>

                    <p class="price" style="color:#FF3B30">{{$pitch->price_viet_nam}}₫/Giờ</p>
                    <div style="border-top: 1px solid #f3f3f3">
                        <h3>Tiện ích tại sân</h3>
                        <div style="display:flex;justify-content: space-between;">
                            <p><i class="fa fa-wifi" style="color:#66e26f" aria-hidden="true"></i> Wifi</p>
                            <p><i class="fa fa-cutlery" aria-hidden="true"></i> Căng tin</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> LiveStream</p>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    Giới thiệu về sân
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p>
                                    Sân bóng đá cỏ nhân tạo
                                    <a href="{{route('detail',$pitch)}}">
                                        <strong
                                            style="color:#e74c3c">{{$pitch->name}}
                                        </strong>
                                    </a> được xây dựng hệ thống nhiều
                                    sân. Sân bóng có đầy đủ tiện ích, công trình phụ trợ được đầu tư bài bản. Nằm ở khu
                                    vực giao thông thuận lợi, vị trí rộng rãi, thoáng mát.

                                    Nằm ở trung tâm quận Bình Tân, Sân bóng
                                    <a href="{{route('detail',$pitch)}}">
                                        <strong
                                            style="color:#e74c3c">{{$pitch->name}}
                                        </strong>
                                    </a> là địa điểm yêu thích của công
                                    đồng
                                    bóng đá phủi quanh khu vực, bên cạnh đó chất lượng mặt cỏ tốt, thái độ nhân viên và
                                    giá
                                    thuê đều được đánh giá cao.
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                   aria-expanded="false" aria-controls="collapseTwo">
                                    Tiện ích sân bóng
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <ul style="padding-left: 20px;">

                                    <li style="list-style-position: outside;"> Có khu để xe máy, ô tô rộng rãi</li>
                                    <li style="list-style-position: outside;"> Có bảo vệ đảm bảo an ninh</li>
                                    <li style="list-style-position: outside;"> Khu dịch vụ, vệ sinh sạch sẽ</li>
                                    <li style="list-style-position: outside;"> Được mượn bóng miễn phí</li>
                                    <li style="list-style-position: outside;"> Cho thuê giày, trang phục đá bóng</li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Về chúng tôi
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingFour">
                            <div class="panel-body">
                                <p><a href="{{route('index')}}">
                                        <strong
                                            style="color:#e74c3c">{{config('app.name')}}
                                        </strong>
                                    </a> là đơn vị đi đầu trong việc đem đến giải pháp toàn diện cho sân bóng
                                    đá, bao gồm: thi công sân cỏ nhân tạo, hợp tác đầu tư sân và dịch vụ vận hành sân
                                    bóng
                                    đá chuyên nghiệp.


                                </p>
                                <p><a href="{{route('index')}}">
                                        <strong
                                            style="color:#e74c3c">{{config('app.name')}}
                                        </strong>
                                    </a> kỳ vọng xây dựng dịch vụ giúp kết nối cộng đồng người chơi bóng đá và
                                    chủ sân, chúng tôi mong muốn và sẵn sàng hợp tác với tất cả chủ sân trên toàn quốc
                                    để
                                    đem đến dịch vụ đặt sân trực tuyến tốt nhất và tiện lợi nhất đến với khách hàng..
                                </p>
                                <p> Chịu trách nhiệm: Nguyễn Trung Thiện - Hotline: 090.479.xxxx
                                </p>
                                <p>Chân thành cảm ơn.</p>


                            </div>
                        </div>
                    </div>
                </div> <!-- Acordeon  -->
            </div>
            <div class="col-md-6">
                <div class="product-details">
                    <a href="">
                        <h2 style="color:black">Đặt sân qua các kênh sau</h2>
                    </a>

                </div>
                <div class="social-line">
                    <a href="{{ route('booking',$pitch) }}" class="btn btn-fill btn-social"
                       style="font-size:20px;background-color:#dd4b39;border:0">
                        Đặt sân ngay
                    </a>
                </div>

                <div style="text-align:center;height:40px;margin-bottom:16px">

                    <a href="https://www.fb.com/thienity" target="_blank"
                       style="font-size:20px;border:1px solid;position:relative;height:40px;width:100%;display: block;line-height:40px">
                        Đặt Qua Facebook

                        <i class="fa fa-facebook-official"
                           style="font-size:46px;color:#3b5898;float:left;position:absolute;left:-1px;top:-4px"
                           aria-hidden="true"></i>
                    </a>
                </div>
                <div style="text-align:center;height:40px">

                    <a href="https://www.fb.com/thienity" target="_blank"
                       style="font-size:20px;border:1px solid;position:relative;height:40px;width:100%;display: block;line-height:40px">
                        Đặt Qua Zalo
                        <svg   style="float:left;position:absolute;left:-4px;top:-6px" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                             fill="rgb(3, 90, 218)">
                            <path opacity="0.24" fill-rule="evenodd" clip-rule="evenodd"
                                  d="M19.26 2.61428H4.71429C3.19946 2.61428 1.97144 3.8423 1.97144 5.35714V18.96C1.97144 20.4748 3.19946 21.7029 4.7143 21.7029H19.26C20.7748 21.7029 22.0029 20.4748 22.0029 18.96V5.35714C22.0029 3.8423 20.7748 2.61428 19.26 2.61428ZM4.71429 2.35714C3.05744 2.35714 1.71429 3.70029 1.71429 5.35714V18.96C1.71429 20.6169 3.05744 21.96 4.7143 21.96H19.26C20.9169 21.96 22.26 20.6169 22.26 18.96V5.35714C22.26 3.70029 20.9169 2.35714 19.26 2.35714H4.71429Z"
                                  fill=""></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M6.76817 21.9497C7.16225 21.9455 7.55616 21.9414 7.94962 21.9414C7.94903 21.9371 7.94835 21.933 7.94758 21.9289C7.94836 21.9329 7.94904 21.937 7.94964 21.9412C8.03935 21.9412 8.12906 21.9456 8.21877 21.9546H14.7005C15.2388 21.9546 15.777 21.9556 16.3153 21.9566C17.3919 21.9586 18.4684 21.9606 19.545 21.9546H19.5674C21.0656 21.9412 22.2677 20.7211 22.2588 19.2229V16.5988C22.2588 16.5825 22.2599 16.5623 22.2611 16.5411C22.2649 16.4752 22.2692 16.3999 22.2408 16.4015C22.1601 16.4059 22.0328 16.4348 21.9879 16.4796C21.6439 16.709 21.3103 16.9594 20.9767 17.2099C20.3095 17.7109 19.6423 18.2118 18.8917 18.5437C15.9708 19.5291 13.3874 19.5758 10.6455 18.9134C10.4954 18.8588 10.424 18.8649 10.2972 18.8758C10.2155 18.8828 10.1108 18.8918 9.94727 18.8877L9.88519 18.8898C9.61469 18.8982 9.22197 18.9104 8.75256 19.196C7.65358 19.5324 6.16307 19.5758 5.39283 19.4606C5.39609 19.468 5.39817 19.4744 5.39979 19.4803L5.39282 19.4653C5.38211 19.4532 5.3686 19.4426 5.35551 19.4323C5.31373 19.3993 5.27624 19.3698 5.34796 19.3083C5.36889 19.2948 5.38983 19.2809 5.41076 19.2669C5.45262 19.239 5.49449 19.2111 5.53636 19.1872C6.12397 18.8059 6.6757 18.3887 7.03904 17.7742C7.53298 17.1753 7.30402 16.9418 6.86756 16.4966L6.85111 16.4798C4.72468 14.31 4.09897 12.0076 4.32075 8.91062C4.58541 7.21057 5.3659 5.74826 6.49179 4.47434C7.1736 3.70281 7.9855 3.07931 8.87365 2.55898C8.88647 2.55082 8.90141 2.54418 8.91666 2.5374C8.9601 2.51808 9.00607 2.49763 9.01271 2.43787C9.01795 2.39067 8.94214 2.37507 8.91522 2.37507C8.40904 2.37507 7.90939 2.37055 7.41206 2.36604C6.42418 2.3571 5.44547 2.34823 4.44299 2.37508C3.00311 2.41546 1.69084 3.40713 1.71461 5.1741C1.72059 8.29626 1.7186 11.4164 1.71661 14.5359C1.71561 16.0954 1.71461 17.6548 1.71461 19.2141C1.71461 20.663 2.82256 21.8786 4.27141 21.9369C5.10253 21.9673 5.93572 21.9585 6.76817 21.9497ZM5.44976 19.5633L5.4601 19.5774C5.53529 19.6441 5.60991 19.7115 5.68409 19.7793C5.61213 19.7105 5.5378 19.6417 5.46012 19.5728L5.44976 19.5633ZM7.74593 21.718C7.72097 21.7016 7.69694 21.684 7.67601 21.663L7.67007 21.6618L7.67599 21.6677C7.69693 21.6867 7.72096 21.7027 7.74593 21.718ZM9.3237 11.902H9.32402C9.75697 11.901 10.1775 11.9 10.5962 11.903C10.9505 11.9075 11.1434 12.0555 11.1793 12.3381C11.2197 12.6924 11.0133 12.9302 10.6276 12.9347C10.0827 12.9414 9.54035 12.9405 8.99674 12.9397H8.99673C8.81536 12.9394 8.63384 12.9391 8.45204 12.9391C8.39165 12.9391 8.33163 12.9399 8.27176 12.9406C8.12264 12.9424 7.97449 12.9443 7.82406 12.9347C7.56389 12.9212 7.30822 12.8674 7.18262 12.5982C7.05702 12.3291 7.14673 12.0869 7.31719 11.8671C8.00797 10.9879 8.70324 10.1042 9.39851 9.22506L9.39852 9.22504L9.39853 9.22504C9.43889 9.17122 9.47925 9.1174 9.51962 9.06807C9.48657 9.01189 9.44379 9.01657 9.40204 9.02114C9.38711 9.02277 9.37231 9.02439 9.35813 9.02321C9.11591 9.02097 8.87257 9.02097 8.62922 9.02097C8.38588 9.02097 8.14254 9.02097 7.90031 9.01873C7.78817 9.01873 7.67603 9.00527 7.56838 8.98284C7.3127 8.92453 7.1557 8.66885 7.21402 8.41766C7.25439 8.2472 7.38896 8.10815 7.55941 8.06778C7.66706 8.04086 7.7792 8.02741 7.89134 8.02741C8.68978 8.02292 9.4927 8.02292 10.2911 8.02741C10.4347 8.02292 10.5737 8.04086 10.7128 8.07675C11.0178 8.17992 11.1479 8.46251 11.0268 8.75856C10.9191 9.01424 10.7487 9.23404 10.5782 9.45383C9.99061 10.2029 9.40299 10.9475 8.81538 11.6877C8.76604 11.746 8.72118 11.8043 8.64941 11.903C8.87832 11.903 9.10262 11.9025 9.3237 11.902ZM13.8527 9.54326C13.9604 9.4042 14.0725 9.27412 14.2565 9.23823C14.6108 9.16646 14.9428 9.39523 14.9472 9.75408C14.9607 10.6512 14.9562 11.5483 14.9472 12.4455C14.9472 12.6787 14.7947 12.8851 14.5749 12.9524C14.3507 13.0376 14.095 12.9703 13.9469 12.7774C13.8707 12.6832 13.8393 12.6653 13.7316 12.7505C13.3234 13.0824 12.8614 13.1407 12.3635 12.9793C11.5651 12.7191 11.2376 12.0956 11.1479 11.3375C11.0537 10.5166 11.3273 9.81688 12.063 9.38626C12.673 9.02292 13.292 9.05432 13.8527 9.54326ZM13.0947 10.1936C13.1622 10.1965 13.2284 10.209 13.2912 10.2305C13.4264 10.2742 13.5466 10.3605 13.633 10.4808C13.8841 10.8217 13.8841 11.3824 13.633 11.7233C13.5881 11.7816 13.5388 11.8309 13.4849 11.8713C13.3474 11.9731 13.1861 12.0202 13.0273 12.0167C12.8773 12.0145 12.7265 11.9672 12.5968 11.8712C12.5429 11.8308 12.4936 11.7815 12.4487 11.7232C12.3366 11.5662 12.2738 11.3778 12.2648 11.1804C12.2603 10.548 12.6057 10.1667 13.0947 10.1936ZM16.9613 11.2074C16.9254 10.0546 17.6835 9.19338 18.76 9.16198C19.9039 9.12609 20.7382 9.89314 20.7741 11.0145C20.81 12.1494 20.1147 12.9524 19.0426 13.06C17.8719 13.1766 16.9433 12.3288 16.9613 11.2074ZM18.0872 11.0997C18.0872 11.0855 18.0874 11.0715 18.0878 11.0576C18.1034 10.5584 18.3948 10.2218 18.8153 10.1981C18.847 10.1963 18.8794 10.1963 18.9125 10.1981C19.1234 10.2026 19.3207 10.3102 19.4463 10.4807C19.4638 10.504 19.4801 10.5284 19.4952 10.5538C19.591 10.7147 19.6386 10.9136 19.6375 11.1122C19.6366 11.3372 19.5737 11.5615 19.4481 11.7284L19.4418 11.7367L19.4411 11.7375C19.3538 11.8479 19.2406 11.9264 19.1167 11.9713C18.9549 12.0314 18.7787 12.031 18.6195 11.975C18.544 11.9488 18.4717 11.9098 18.4057 11.8578C18.3569 11.8223 18.3169 11.7781 18.2814 11.7295L18.2801 11.7278C18.1456 11.544 18.0783 11.3243 18.0872 11.1002L18.0872 11.0997ZM16.5666 10.3148C16.5666 10.5465 16.5671 10.7783 16.5675 11.0101C16.5685 11.4736 16.5695 11.9371 16.5666 12.4006C16.571 12.7191 16.3198 12.9837 16.0014 12.9927C15.9475 12.9927 15.8892 12.9882 15.8354 12.9748C15.6111 12.9165 15.4407 12.6787 15.4407 12.3961V8.83004C15.4407 8.75959 15.4402 8.68965 15.4397 8.61988C15.4387 8.48082 15.4377 8.34243 15.4407 8.20205C15.4451 7.85665 15.6649 7.63237 15.9969 7.63237C16.3378 7.62788 16.5666 7.85217 16.5666 8.21102C16.5695 8.67763 16.5685 9.14624 16.5675 9.61419V9.61436C16.567 9.84811 16.5666 10.0817 16.5666 10.3148Z"
                                  fill=""></path>
                        </svg>

                    </a>
                </div>

                @if($pitch->pitch)
                    <div class="title">
                        <h4 style="text-align:center;">Sân to của sân</h4>
                    </div>
                    <div class="row " style="padding-top:10px">


                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{ url('/storage') }}/{{$pitch->pitch->img}}" alt="..." width="165" height="124">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="#">
                                            <h4 class="title">{{$pitch->pitch->name}}</h4>
                                        </a>
                                        <p class="description">
                                            Sân bóng có đầy đủ tiện ích, công trình phụ trợ được đầu tư bài bản. Nằm ở khu vực giao thông thuận lợi, vị trí rộng rãi, thoáng mát.
                                        </p>
                                        <div class="footer">

                                            <span class="price price-old"> {{$pitch->pitch->first_price_viet_nam }}₫</span>
                                            <span class="price price-new"> {{$pitch->pitch->price_viet_nam}}₫/Giờ</span>
                                            <p class="price"></p>
                                            <button class="btn btn-danger btn-simple pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Remove from wishlist">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    @elseif($pitch->pitches)
                        <div class="title">
                            <h4 style="text-align:center;">Các sân nhỏ của sân</h4>
                        </div>
                        <div class="row " style="padding-top:10px">

                            @foreach($pitch->pitches as $getChild)
                                <div class="col-md-4">
                                    <div class="card card-product card-plain">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ url('/storage') }}/{{$getChild->img}}" alt="..." width="165" height="124">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <a href="#">
                                                <h4 class="title">{{$getChild->name}}</h4>
                                            </a>
                                            <p class="description">
                                                Sân bóng có đầy đủ tiện ích, công trình phụ trợ được đầu tư bài bản. Nằm ở khu vực giao thông thuận lợi, vị trí rộng rãi, thoáng mát.
                                            </p>
                                            <div class="footer">

                                                <span class="price price-old"> {{$getChild->first_price_viet_nam }}₫</span>
                                                <span class="price price-new"> {{$getChild->price_viet_nam}}₫/Giờ</span>
                                                <p class="price"></p>
                                                <button class="btn btn-danger btn-simple pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Remove from wishlist">
                                                    <i class="fa fa-heart"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                @endif


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
