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
                        <button class="btn btn-secondary">Xóa</button>

                    </form>

                </td>
            </tr>
            </tbody>
        @endforeach


    </table>

@endsection
