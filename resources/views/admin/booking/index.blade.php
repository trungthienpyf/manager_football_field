@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">


                </div>
                <h4 class="page-title">Lịch đặt sân</h4>
            </div>
            <form action="{{route('admin.booking.index')}}">

                <div class="row">
                    <div class="col-2">
                        <div class="input-group">
                            <select name="status" id="" class="custom-select">
                                @foreach($status as $key  => $sta)
                                    <option value="{{$sta}}"
                                            @if (request()->status==$sta)
                                            selected
                                        @endif
                                    >{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control dropdown-toggle" placeholder="Tìm kiếm..." name="q"
                                   @if(request()->q)
                                   value="{{request()->q}}"
                                @endif>

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="submitSearch">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                    <th>Giá tiền</th>
                    <th>Thời gian nhận sân</th>
                    <th>Thời gian trả sân</th>
                    <th>Chi tiết</th>
                    <th>Trạng thái</th>

                    @if(is_null(request()->status) || request()->status==0  )
                    <th>Hành động</th>
                    <th>Hành động</th>
                        @endif
                </tr>
                </thead>

                @foreach ($bills as $each)
                    <tbody>
                    <tr id="{{$each->id}}">
                        <td>{{$each->id}}</td>
                        <td>{{$each->name_receive}}</td>
                        <td>{{$each->phone_receive}}</td>
                        <td>{{$each->price}}</td>
                        <td>{{$each->time_date_start}}</td>
                        <td>{{$each->time_date_start}}</td>
                        <td>Chi tiết để sau</td>
                        <td>{{$each->getKeyByValue($each->status)}}</td>
                            @if(request()->status==0 )
                        <td>
                            <div class="row">
                                <form action="{{route('admin.booking.accept',$each)}}" method="post"
                                      class="form_accept{{$each->id}}">

                                    <button type="button" class="action-icon buttonSubmit"
                                            style="border:0; background-color: transparent;"
                                            data-toggle="modal"
                                            data-target="#warning-header-modal"
                                            onclick="submitForm({{$each->id}})"
                                            id="buttonSubmitForm{{$each->id}}"
                                    >
                                        <i class="mdi mdi-check" style="color:green"></i>
                                    </button>
                                </form>
                                <div id="warning-header-modal" class="modal fade" tabindex="-1" role="dialog"
                                     aria-labelledby="warning-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-warning"
                                                 id="changeColorHeader">
                                                <h4 class="modal-title" id="warning-header-modalLabel">Thông báo</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body" id="text-body-alert">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Đóng
                                                </button>
                                                <button type="button" class="btn btn-warning submitAccept"
                                                        data-dismiss="modal" id="changeColor">Duyệt
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('admin.booking.cancel',$each)}}" method="post">
                                    @csrf
                                    <button type="button" class="action-icon"
                                            style="border:0; background-color: transparent;"
                                            data-toggle="modal"
                                            data-target="#danger-header-modal"
                                            onclick="rejectForm({{$each->id}})"
                                    >
                                        <i class="mdi mdi-close" style="color:red"></i>
                                    </button>
                                </form>
                                <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
                                     aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-colored-header bg-danger"
                                                 id="changeColorHeader">
                                                <h4 class="modal-title" id="danger-header-modalLabel">Thông báo</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body" id="text-body-danger">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Đóng
                                                </button>
                                                <button type="button" class="btn btn-danger " id="deleteSubmit"
                                                        data-dismiss="modal">Hủy đơn
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('admin.pitch.destroy',$each)}}" method="post">

                                @csrf
                                @method('delete')
                                <button id="delete-button-field" class="btn btn-secondary" type="button"
                                        data-toggle="modal" data-target="#warning-header-modal"
                                        onClick="deletePitch({{ $each->id  }})">Xóa
                                </button>
                            </form>

                        </td>
                                @endif
                    </tr>
                    </tbody>
                @endforeach


            </table>
            @include('error')
            <style>
                .pagination > li {
                    display: inline
                }

                .pagination > li > a, .pagination > li > span {
                    position: relative;
                    float: left;
                    padding: 6px 12px;
                    margin-left: -1px;
                    line-height: 1.42857143;
                    color: #337ab7;
                    text-decoration: none;
                    background-color: #fff;
                    border: 1px solid #ddd
                }

                .pagination > li:first-child > a, .pagination > li:first-child > span {
                    margin-left: 0;
                    border-top-left-radius: 4px;
                    border-bottom-left-radius: 4px
                }

                .pagination > li:last-child > a, .pagination > li:last-child > span {
                    border-top-right-radius: 4px;
                    border-bottom-right-radius: 4px
                }

                .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover {
                    z-index: 3;
                    color: #23527c;
                    background-color: #eee;
                    border-color: #ddd
                }

                .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
                    z-index: 2;
                    color: #fff;
                    cursor: default;
                    background-color: #337ab7;
                    border-color: #337ab7
                }

                .pagination > .disabled > a, .pagination > .disabled > a:focus, .pagination > .disabled > a:hover, .pagination > .disabled > span, .pagination > .disabled > span:focus, .pagination > .disabled > span:hover {
                    color: #777;
                    cursor: not-allowed;
                    background-color: #fff;
                    border-color: #ddd
                }

                .pagination-lg > li > a, .pagination-lg > li > span {
                    padding: 10px 16px;
                    font-size: 18px;
                    line-height: 1.3333333
                }

                .pagination-lg > li:first-child > a, .pagination-lg > li:first-child > span {
                    border-top-left-radius: 6px;
                    border-bottom-left-radius: 6px
                }

                .pagination-lg > li:last-child > a, .pagination-lg > li:last-child > span {
                    border-top-right-radius: 6px;
                    border-bottom-right-radius: 6px
                }

                .pagination-sm > li > a, .pagination-sm > li > span {
                    padding: 5px 10px;
                    font-size: 12px;
                    line-height: 1.5
                }

                .pagination-sm > li:first-child > a, .pagination-sm > li:first-child > span {
                    border-top-left-radius: 3px;
                    border-bottom-left-radius: 3px
                }

                .pagination-sm > li:last-child > a, .pagination-sm > li:last-child > span {
                    border-top-right-radius: 3px;
                    border-bottom-right-radius: 3px
                }
            </style>
            <div class="d-flex justify-content-center">
                {{ $bills->links()  }}
            </div>

        </div>
    </div>





@endsection
@push('scripts')

    <script>

        $('.custom-select').change(function () {
            $('#submitSearch').click()
        })
        function submitForm(id) {

            console.log(id)

            if ($('#getId').length) {
                $('#getId').remove();
                $('.form_accept' + id).append(`<input type='hidden' name='id' value='${id}' id="getId">`);
            } else {
                $('.form_accept' + id).append(`<input type='hidden' name='id'  value='${id}' id="getId">`);
            }
            let textAlert = $('#text-body-alert')

            $.ajax({
                url: '{{route('admin.booking.checkBill')}}',
                type: 'post',

                data: {_token: '{{session()->token()}}', id: id},
                success: function (response) {
                    // console.log(response.warning.replace('đơn này',' ').replace('các đơn',) )

                    let arrExcept = []
                    if (response.warning && response.data) {

                        response.data.forEach(function (each) {
                            arrExcept.push(each.id)
                        })

                        let textDesc = response.warning.replace('đơn này', 'đơn ' + `<span style="color:red">#${id}</span>` + ' này').replace('các đơn', 'các đơn ' + `<span style="color:red">#${arrExcept.join(' #')}</span>`)

                        textAlert.html(textDesc)
                        $('#changeColor').attr('class', 'btn btn-danger submitAccept')
                        $('#changeColorHeader').attr('class', 'modal-header modal-colored-header bg-danger')

                    } else if (response.warning == undefined) {
                        $('#changeColor').attr('class', 'btn btn-warning submitAccept')
                        $('#changeColorHeader').attr('class', 'modal-header modal-colored-header bg-warning')
                        textAlert.text("Bạn có chắc chắc muốn duyệt đơn #" + id + " này")

                    }
                }
            })
        }

        function rejectForm(id) {

            // $('#warning-header-modal').css({
            //     'display':'block',
            //     ' padding-right': '17px'
            // })
            // if ($('#getId').length) {
            //     $('#getId').remove();
            //     $('.form_accept'+id).append(`<input type='hidden' name='id' value='${id}' id="getId">`);
            // } else {
            //     $('.form_accept'+id).append(`<input type='hidden' name='id'  value='${id}' id="getId">`);
            // }
            let textAlert = $('#text-body-danger')

            textAlert.text("Bạn có chắc chắn muộn hủy đơn này ?")
            $('#deleteSubmit').click(function () {
                $.ajax({
                    url: '{{route('admin.booking.cancel')}}',
                    type: 'delete',
                    data: {_token: '{{session()->token()}}', id: id},
                    success: function (response) {

                    }
                })
                $('tr[id=' + id + ']').remove()
                // $('.delete-button-field'+id).parent().parent().parent().remove()
                // $('.modal-backdrop.fade.show').hide()
                // $('#danger-header-modal').css({
                //     'display':'',
                //     ' padding-right': ''
                // })
            })
        }


        $('.submitAccept').click(function (e) {

            let id = $('#getId').val()
            $.ajax({
                url: '{{route('admin.booking.accept')}}',
                type: 'post',

                data: {_token: '{{session()->token()}}', id: id},
                success: function (response) {
                    console.log(response.id)
                    if (response.id) {
                        response.id.forEach(function (ids) {
                            console.log(ids)
                            $('#buttonSubmitForm' + ids).parent().parent().parent().parent().parent().remove()
                        })
                    }

                }
            })


            $('#buttonSubmitForm' + id).parent().parent().parent().parent().parent().remove()
            $('.modal-backdrop.fade.show').remove()


        })


    </script>

    {{--    <script>$.toast({--}}
    {{--            heading: 'Information',--}}
    {{--            text: 'Loaders are enabled by default. Use `loader`, `loaderBg` to change the default behavior',--}}
    {{--            icon: 'info',--}}
    {{--            loader: true,        // Change it to false to disable loader--}}
    {{--            loaderBg: '#9EC600'  // To change the background--}}
    {{--        })</script>--}}
@endpush
