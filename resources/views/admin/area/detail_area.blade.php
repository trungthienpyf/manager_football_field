@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Chi tiết khu vực
                    <a href="{{route('admin.area.edit',$id)}}">
                        {{$titleArea->name}}
                    </a>
                </h4>
                <form action="{{route('admin.area.index')}}">

                    <div class="row">

                        <div class="col-3">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Tìm kiếm..."
                                       name="q">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                                </div>
                            </div>
                        </div>
                        <div class="page-title">

                            <a class="btn btn-primary" href="{{route('admin.area.calendarBooking',$id)}}">
                                <i class="dripicons-calendar" aria-hidden="true"></i>  Xem sân đã cho thuê
                            </a>
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
            <th scope="col">Tên sân</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Giá</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
        </tr>
        </thead>

        @foreach ($pitches as $each)
            <tbody>
            <tr scope="row">
                <td>{{$each->id}}</td>
                <td>
                    <a href="{{route('admin.pitch.edit',$each)}}" class="button_a">
                        {{$each->name}}
                    </a>

                </td>
                <td><img src="{{$each->name_img}}" alt="" width="100px"></td>
                <td>{{$each->price_viet_nam}} vnd/h</td>


                <td>

                    <a href="{{route('admin.pitch.edit',$each)}}" target="_blank" class="action-icon button_edit">
                        <i class="mdi mdi-pencil"></i>
                    </a>

                </td>
                <td>
                    <form action="{{route('admin.pitch.destroy',$each)}}" method="post">
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
        {{ $pitches->appends(request()->all())->links()  }}
    </div>


@endsection
@push('scripts')

@endpush
