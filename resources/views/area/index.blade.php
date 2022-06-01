@extends('layout.master')
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
            <th scope="col">Name</th>
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
                        <button id="delete-button-field" class="btn btn-secondary" type="button" data-toggle="modal" data-target="#danger-header-modal" onClick="deleteArea({{ $each->id  }})">Xóa</button>

                    </form>
                    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header modal-colored-header bg-danger">
                                    <h4 class="modal-title" id="danger-header-modalLabel">Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body" id="text-body-alert">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-danger" id="submit-delete" >Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        @endforeach


    </table>

@endsection
@push('scripts')
    <script>
        function deleteArea(id){
            $('#text-body-alert').text("Bạn có chắc chắn muốn xóa khu vực có id là " +id +" ?")

            $('#submit-delete').click(function(){
                $.ajax({
                    url:  '/admin/area/'+id,
                    type: 'delete',
                    data: {_token:'{{session()->token()}}'},
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
