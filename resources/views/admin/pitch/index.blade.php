@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                    <a class="btn btn-primary" href="{{route('admin.pitch.create')}}">
                        Thêm
                    </a>
                </div>
                <h4 class="page-title">Khu vực</h4>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table  table-centered mb-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Khu vực</th>
                    <th>Loại người</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pitch as $each)
                    <tr>
                        <td>{{$each->id}}</td>
                        <td>{{$each->name}}</td>

                        <td>
                            @if(!empty($each->img))
                                <img src="{{ url('/storage') }}/{{$each->img}}" alt="" width="100px">
                            @endif
                        </td>

                        <td>{{$each->price}}</td>

                        <td>{{$each->getKeyByValue($each->status)}}</td>

                        <td>{{$each->area->name}}</td>
                        <td>{{$each->getViewSize()}}</td>
                        <td>
                            <a href="{{route('admin.pitch.edit',$each)}}" class="action-icon">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('admin.pitch.destroy',$each)}}" method="post">

                                @csrf
                                @method('delete')
                                <button id="delete-button-field" class="btn btn-secondary" type="button"
                                        data-toggle="modal" data-target="#danger-header-modal"
                                        onClick="deletePitch({{ $each->id  }})">Xóa
                                </button>
                            </form>
                            <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
                                 aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabel">Thông báo</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                        <div class="modal-body" id="text-body-alert">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Đóng
                                            </button>
                                            <button type="button" class="btn btn-danger" id="submit-delete">Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @include('error')
            <div class="d-flex justify-content-center">
                {{ $pitch->links()  }}
            </div>

        </div>
    </div>





@endsection
@push('scripts')
    <script>
        function deletePitch(id) {
            $('#text-body-alert').text("Bạn có chắc chắn muốn xóa sân có id là " + id + " ?")

            $('#submit-delete').click(function () {
                $.ajax({
                    url: '/admin/pitch/' + id,
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
