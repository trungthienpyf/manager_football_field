@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a  href="{{route('admin.area.index')}}" >
                        <i class="dripicons-backspace"></i> Quay lại
                    </a>
                </div>
                <h4 class="page-title">Thêm Khu vực</h4>
            </div>
        </div>
    </div>
<form action="{{route('admin.area.store')}} " method="post">
    @csrf
    <div class="form-group">
    <label for="name" >Tên khu vực</label>
    <input type="text" class="form-control" id="name" placeholder="Tên" name="name" value="{{old('name')}}">
    </div>

    @include('error')
    <button class="btn btn-primary">Thêm</button>
</form>

@endsection
