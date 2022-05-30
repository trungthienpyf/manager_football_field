@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('admin.pitch.index')}}">
                        <i class="dripicons-backspace"></i> Quay lại
                    </a>
                </div>
                <h4 class="page-title">Thêm sân</h4>
            </div>
        </div>
    </div>
    <form action="{{route('admin.pitch.store')}} " method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên thể loại</label>
            <input type="text" class="form-control" id="name" placeholder="Tên" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" class="form-control" id="Giá" placeholder="Tên" name="price" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="img">Ảnh</label>
            <input type="file" id="img" name="img" class="form-control-file">
        </div>
        Khu vực
        <select name="area_id" class="custom-select mb-3">
            @foreach($area as $each)
                <option value="{{$each->id}}">
                    {{$each->name}}
                </option>
            @endforeach
        </select>
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
        <div class="mt-3">
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

        @include('error')
        @if(session()->has('message'))
            {{session()->get('message')}}
            <br>
        @endif
        <button class="btn btn-primary">Thêm</button>
    </form>
@endsection
@push('scripts')
    <script >


            $('#radio1').change(function(){
                $('#div_click').removeClass('active')

            })
            $('#radio2').change(function(){
                $('#div_click').addClass('active')

            })

    </script>
@endpush
