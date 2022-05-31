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
                <h4 class="page-title">Sửa sân</h4>
            </div>
        </div>
    </div>
<form action="{{route('admin.pitch.update',$pitch)}} " method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="name">Tên thể loại</label>
        <input type="text" class="form-control" id="name" placeholder="Tên" name="name" value="{{$pitch->name}}">
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" class="form-control" id="Giá" placeholder="Tên" name="price" value="{{$pitch->price}}">
    </div>
    <div class="form-group">
        <label for="img">Ảnh</label>
        <input type="file" id="img" name="img" class="form-control-file" value="{{$pitch->img}}">
    </div>
    @if(!empty($pitch->img))
    Ảnh cũ
    <div class="form-group">
        <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="" width="100px">
        <input type="hidden" name="img_old" value="{{$pitch->img}}">
    </div>
    @endif


    Khu vực
    <select name="area_id" class="custom-select mb-3">
        @foreach($area as $each)
            <option value="{{$each->id}}" @if($each->id === $pitch->area_id)
                selected
                @endif>
                {{$pitch->area_id}}

            </option>
        @endforeach
    </select>
    <label>Trạng thái</label>
    <div class="mt-2">
        @foreach($status as $key => $value)
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="status" id="{{$value}}" value="{{ $value }}" class="custom-control-input"
                       @if ($value ===$pitch->status)
                       checked
                    @endif
                >
                <label class="custom-control-label" for="{{$value}}">{{$key}}</label>
            </div>
        @endforeach
    </div>
{{--    Loại sân:--}}
{{--    Sân nhỏ 7 người--}}
{{--    <input type="radio" name="size" value="1" @if($pitch->size ==1) checked    @endif> Thuộc sân--}}

{{--    <select name="pitch_id">--}}
{{--        <option checked  value="" >Hãy chọn sân to</option>--}}
{{--        @foreach($size_11 as $each)--}}
{{--            <option value="{{$each->id}}" @if($each->id == $pitch->pitch_id) selected @endif>--}}
{{--                {{$each->name}}--}}
{{--            </option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    <br>--}}
{{--    Sân to 11 người--}}
{{--    <input type="radio" name="size" value="2" @if($pitch->size ==2) checked @endif>--}}
{{--    <br>--}}
    <div class="mt-3">
        Loại sân:
        <div class="custom-control custom-radio">
            <div class="row ml-0">
                <div class="mt-2 ">
                    <input type="radio" id="radio1" name="size" class="custom-control-input" value="1" @if($pitch->size ==1) checked @endif>
                    <label class="custom-control-label" for="radio1">  Sân nhỏ 7 người</label>
                </div>
                <div class="mt-2 offset-2 "  id="div_click">
                    Thuộc sân
                    <select name="pitch_id" >
                        <option checked value="">Hãy chọn sân to</option>
                        @foreach($size_11 as $each)
                            <option value="{{$each->id}}"  @if($each->id == $pitch->pitch_id) selected @endif>
                                {{$each->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="radio2" name="size" class="custom-control-input" value="2" @if($pitch->size ==2) checked @endif>
            <label class="custom-control-label" for="radio2" > Sân to 11 người</label>
        </div>
    </div>

    @include('error')
    @if(session()->has('message'))
        {{session()->get('message')}}
        <br>
    @endif
    <button class="btn btn-primary">Sửa</button>
</form>
@endsection
@push('scripts')
    <script >
            let attr=$('#radio2').attr('checked')
            if(attr){
                $('#div_click').addClass('active')
            }
        $('#radio1').change(function(){
            $('#div_click').removeClass('active')

        })
        $('#radio2').change(function(){
            $('#div_click').addClass('active')
        })
    </script>
@endpush
