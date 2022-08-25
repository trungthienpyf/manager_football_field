@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                    <div class="page-title-right">
                        <a  href="{{route('admin.booking.index')}}" >
                            <i class="dripicons-backspace"></i> Quay lại
                        </a>
                    </div>

                <h4 class="page-title">Chi tiết đơn đặt</h4>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table  table-centered mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên người đặt</th>
                    <th>Số điện thoại người đặt</th>
                    <th>Sân</th>
                    <th>Hình</th>
                    <th>Giá tiền</th>
                    <th>Thời gian nhận sân</th>
                    <th>Thời gian trả sân</th>
                    <th>Trạng thái</th>

                    <th>Lịch sử duyệt</th>

                </tr>
                </thead>


                    <tbody>
                    <tr id="{{$bill->id}}">
                        <td>{{$bill->id}}</td>
                        <td>{{$bill->name_receive}}</td>
                        <td>
                            <a href="">{{$bill->phone_receive}}</a>
                        </td>
                        <td>
                            {{$bill->pitch->name}}
                        </td>
                        <td>@if(!empty($bill->pitch->img))
                                <img src="{{ $bill->pitch->name_img}}" alt="" width="100px">
                            @endif </td>

                        <td>{{$bill->pitch->price_viet_nam}}₫/Giờ</td>
                        <td>{{$bill->time_date_start}}</td>
                        <td>{{$bill->time_date_end}}</td>
                        <td>
                           <span  @if($bill->status==0)
                                  class="pending"
                                  @elseif($bill->status==1)
                                  class="changeColorAccept"
                                  @elseif($bill->status==2)
                                  class="reject"
                                @endif>
                                {{$bill->getKeyByValue($bill->status)}}
                            </span></td>

                        @if($bill->admin)
                        <td>
                           <div>Tên: {{$bill->admin->name}} </div>
                           <div>Tg: {{$bill->updated_at}}</div>
                        </td>
                        @endif

                    </tr>
                    </tbody>



            </table>

        </div>
    </div>





@endsection
@push('scripts')

    <script>




    </script>


@endpush
