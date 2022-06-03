@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a  href="{{route('admin.area.index')}}" >
                        <i class="dripicons-backspace"></i> Quay lại
                    </a>
                </div>
                <h4 class="page-title">Sửa</h4>
            </div>
        </div>
    </div>
<form action="{{route('admin.area.update',$area)}}" method="post">
    @csrf
    @method('put')


    <div class="form-group">
        <label for="name" >Tên khu vực</label>
        <input type="text" class="form-control" id="name" placeholder="Tên" name="name" value="{{$area->name}}">
    </div>
    @include('error')
    <button class="btn btn-primary">Thêm</button>
</form>
@endsection
