@extends('layout.master')
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

<table  class="table  table-centered mb-0">
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

            <td><img src="{{ url('/storage') }}/{{$each->img}}" alt="" width="100px" ></td>
            <td>{{$each->price}}</td>

            <td>{{$each->getKeyByValue($each->status)}}</td>

            <td>{{$each->area->name}}</td>
            <td>{{$each->getViewSize()}}</td>

            <td>
                    <a href="{{route('admin.area.edit',$each)}}" class="action-icon">
                        <i class="mdi mdi-pencil"></i>
                    </a>
              </td>
            <td>
                <form action="{{route('admin.pitch.destroy',$each)}}" method="post" >
                    @csrf
                    @method('delete')
                    <button class="btn btn-secondary">Xóa</button>

                </form>

            </td>
        </tr>
    @endforeach
    </tbody>

</table>

    @include('error')
    {{ $pitch->links()  }}
@endsection
