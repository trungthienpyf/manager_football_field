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
            </div>

        </div>
    </div>
    <table class="table mb-0">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên khu vực</th>
            <th scope="col">Xem các sân của khu vực</th>
            <th scope="col">Thêm nhanh</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
        </tr>
        </thead>

        @foreach ($area as $each)
            <tbody>
            <tr scope="row">
                <td>{{$each->id}}</td>
                <td>{{$each->name}}</td>
                <td>

                    <a href="">

                        <i class="dripicons-preview"></i>
                    </a>
                    <span class="pl-1">  {{$each->countPitch}} Sân </span>
                </td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup-modal"
                            onclick="selectId(2)">
                        <i class="dripicons-plus ">
                        </i>
                    </button>

                </td>
                <td>
                    <a href="{{route('admin.area.edit',$each)}}">
                        <a href="{{route('admin.area.edit',$each)}}" class="action-icon">
                          <i class="mdi mdi-pencil"></i>
                        </a>
                    </a>
                </td>
                <td>
                    <form action="{{route('admin.area.destroy',$each)}}" method="post">
                        @csrf
                        @method('delete')
                        <button id="delete-button-field" class="btn btn-secondary" type="button" data-toggle="modal"
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
                                    <button type="button" class="btn btn-danger" id="submit-delete">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="text-center mt-2 ">
                        <h3>Thêm sân</h3>
                    </div>
                    <form class="pl-3 pr-3" action="#" id="form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên sân</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên" name="name" >
                        </div>


                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input class="form-control" type="number" id="price" name="phone"
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
                                    <input type="radio" name="status" id="{{$value}}" value="{{ $value }}" class="custom-control-input"
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
                                    <div class="mt-2 ">
                                        <input type="radio" id="radio1" name="size" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="radio1">  Sân nhỏ 7 người</label>
                                    </div>
                                    <div class="mt-2 offset-2 active"  id="div_click">
                                        Thuộc sân
                                        <select name="pitch_id" >
                                            <option checked value="">Hãy chọn sân to</option>
                                            @foreach($size_11 as $each)

                                                <option value="{{$each->id}}">
                                                    {{$each->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="radio2" name="size" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="radio2"> Sân to 11 người</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">

                                <span style="color:black">Từ </span> <input type="number" class="form-control" id="name" value="1" placeholder="Tên" name="name" >
                            </div>
                            <div class="form-group col-md-6">

                                <span style="color:black">Đến </span> <input type="number" class="form-control" id="name" value="5" placeholder="Tên" name="name" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary">Đặt sân</button>
                        </div>

                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@push('scripts')
    <script>
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
                $('#delete-button-field').parent().parent().parent().remove()
                $('.modal-backdrop.fade.show').hide()
            })
        }
    </script>
@endpush
