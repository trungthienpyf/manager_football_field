@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a class="btn btn-primary" href="{{route('admin.area.create')}}">
                        Thêm
                    </a>
                </div>
                <h4 class="page-title">Khu vực</h4>
                <form action="{{route('admin.area.index')}}" >

                    <div class="row">

                        <div class="col-3">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Tìm kiếm..." name="q">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <table class="table mb-0">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên khu vực</th>
            <th scope="col">Xem các sân của khu vực</th>
            <th scope="col">Thêm sân</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
        </tr>
        </thead>

        @foreach ($area as $each)
            <tbody>
            <tr scope="row">
                <td>{{$each->id}}</td>
                <td>
                    <a href="{{route('admin.area.edit',$each)}}">
                        {{$each->name}}
                    </a>

                </td>
                <td>

                    <a href="{{route('admin.area.show',$each)}}"  class="button_preview" target="_blank">
                        <i class="dripicons-preview"></i>
                    </a>



                    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="max-height: 900px; min-width: 1000px;overflow-y: scroll;">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Các sân thuộc khu
                                        vực {{$each->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table  table-centered mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Hình</th>
                                            <th>Giá</th>
                                            <th>Loại người</th>
                                        </tr>
                                        </thead>
                                        <tbody id="container-preview">

                                        </tbody>

                                    </table>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <span class="pl-1">  {{$each->countPitch}} Sân </span>
                </td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal"
                            onclick="selectId({{$each->id}})">
                        <i class="dripicons-plus ">
                        </i>
                    </button>

                </td>
                <td>

                        <a href="{{route('admin.area.edit',$each)}}"  class="action-icon button_edit">
                            <i class="mdi mdi-pencil"></i>
                        </a>

                </td>
                <td>
                    <form action="{{route('admin.area.destroy',$each)}}" method="post">
                        @csrf
                        @method('delete')
                        <button id="delete-button-field" class="btn btn-danger delete-button-field{{$each->id}}"
                                type="button" data-toggle="modal"
                                data-target="#danger-header-modal" onClick="deleteArea({{ $each->id  }})">Xóa
                        </button>

                    </form>
                    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header modal-colored-header bg-danger">
                                    <h4 class="modal-title" id="danger-header-modalLabel">Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body" id="text-body-alert">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                            id="submit-delete">Xóa
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $area->appends(request()->all())->links()  }}
    </div>
    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="text-center mt-2 ">
                        <h3>Thêm sân</h3>
                    </div>
                    <form class="pl-3 pr-3" action="{{route('admin.area.create_multiple')}}" id="form" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên sân</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên" name="name">
                        </div>


                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input class="form-control" type="number" id="price" name="price"
                                   placeholder="Giá thuê">
                        </div>
                        <div class="form-group">
                            <label for="img">Ảnh</label>
                            <input type="file" id="img" name="img" class="form-control-file">
                        </div>
                        <label>Trạng thái</label>
                        <div class="mt-2">
                            @foreach($status as $key => $value)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="status" id="{{$value}}" value="{{ $value }}"
                                           class="custom-control-input"
                                           @if ($loop->first)
                                           checked
                                        @endif
                                    >
                                    <label class="custom-control-label" for="{{$value}}">{{$key}}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-3 mb-2">
                            Loại sân:

                            <div class="custom-control custom-radio">
                                <div class="row ml-0">
                                    <input type="radio" id="radio2" name="size" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="radio2"> Sân to 11 người</label>
                                    <div class="mt-2 offset-2 active" id="click_option">
                                        <input type="checkbox" name="create_child" id="child_val">
                                        Tạo nhanh 4 sân nhỏ cho sân này
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-radio">
                                <div class="row ml-0">
                                    <div>
                                        <input type="radio" id="radio1" name="size" class="custom-control-input"
                                               value="1">
                                        <label class="custom-control-label" for="radio1"> Sân nhỏ 7 người</label>
                                    </div>
                                    <div class="mt-2 offset-2 active" id="div_click">
                                        Thuộc sân
                                        <select name="pitch_id" id="select_let_append">
                                            <option checked value="">Hãy chọn sân to</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                            <button id="submitForm" type="button" class="btn btn-primary">Thêm sân</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->

        </div>
    </div>

@endsection
@push('scripts')
    <script>



        $('#submitForm').click(function () {
            var files = $('#form');
            const formData = new FormData(files[0]);
            $.ajax({
                url: $('#form').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                success: function (response) {
                    console.log(response.data)
                    location.reload()
                },
                error: function (message) {
                    if (typeof message.responseJSON != 'undefined') {
                        $.each(message.responseJSON.errors, function (key, each) {
                            $.toast({
                                heading: 'Error',
                                text: each.toString(),
                                icon: 'error',
                                position: 'top-right',
                                loader: true,
                                loaderBg: '#9EC600'
                            })
                        })
                    }
                }
            })
        })

        function selectId(id) {
            $('#radio1').prop('checked', false)
            $('#div_click').addClass('active')
            $('#child_val').prop('checked', false)
            $('#click_option').addClass('active')
            $('#radio2').prop('checked', false);
            if ($('#getId').length) {
                $('#getId').remove();
                $('#form').append(`<input type="hidden" name="area_id" id="getId" value="${id}"/>`)
            } else {
                $('#form').append(`<input type="hidden" name="area_id" id="getId" value="${id}"/>`)
            }
        }

        $('#radio1').change(function () {
            $('#div_click').removeClass('active')
            $('#click_option').addClass('active')
            $('.remove_case').remove()
            let id = $('#getId').val()
            $.ajax({
                url: '{{route('api.pass_area')}}',
                type: 'POST',
                data: {val: id},
                success: function (response) {
                    console.log(response.data)
                    response.data.forEach(function (pitch) {
                        $('#select_let_append').append(`<option value="${pitch.id}" class="remove_case"> ${pitch.name} </option>`)
                    })

                }
            })

        })
        $('#radio2').change(function () {
            $('#div_click').addClass('active')
            $('#click_option').removeClass('active')


        })
        $('#select_let_append').click(function () {
            let area = $('#area_value').val()
            if (area == '') {
                $.toast({
                    heading: 'Warning',
                    text: 'Vui lòng chọn khu vực của sân to',
                    icon: 'error',
                    position: 'top-right',
                })
            }
        })

        function deleteArea(id) {
            $('#text-body-alert').text("Bạn có chắc chắn muốn xóa khu vực có id là " + id + " ?")

            $('#submit-delete').click(function () {
                $.ajax({
                    url: '/admin/area/' + id,
                    type: 'delete',
                    data: {_token: '{{session()->token()}}'},
                    success: function (response) {
                        console.log(response)
                    }
                })
                $('.delete-button-field' + id).parent().parent().parent().remove()
                $('.modal-backdrop.fade.show').hide()
                $('#danger-header-modal').css({
                    'display': '',
                    ' padding-right': ''
                })
            })
        }

    </script>
@endpush
