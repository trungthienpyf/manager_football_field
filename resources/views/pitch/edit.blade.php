@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Khu vực</h4>
            </div>
        </div>
    </div>
<form action="{{route('admin.pitch.update',$pitch)}} " method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    Tên thể loại
    <input type="text" name="name" value="{{$pitch->name}}">
    <br>
    Giá
    <input type="number" name="price" value="{{$pitch->price}}">
    <br>
    Ảnh
    <input type="file" name="img" value="{{$pitch->img}}">

    @if(!empty($pitch->img))
        <br>
    Ảnh cũ
    <img src="{{ url('/storage') }}/{{$pitch->img}}" alt="" width="100px">
        <input type="hidden" name="img_old" value="{{$pitch->img}}">
    @endif

    <br>
    Khu vực
    <select name="area_id">
        @foreach($area as $each)
            <option value="{{$each->id}}" @if($each->id === $pitch->area_id)
                selected
                @endif>
                {{$pitch->area_id}}

            </option>
        @endforeach
    </select>
    <br>
    Trạng thái
    @foreach($status as $key => $value)
        <input type="radio" name="status" value="{{ $value }}"
               @if ($value === $pitch->status)
               checked
            @endif
        >
        {{$key}}
    @endforeach
    <br>
    Loại sân:
    Sân nhỏ 7 người

    <input type="radio" name="size" value="1" @if($pitch->size ==1) checked    @endif> Thuộc sân

    <select name="pitch_id">
        <option checked  value="" >Hãy chọn sân to</option>
        @foreach($size_11 as $each)
            <option value="{{$each->id}}" @if($each->id == $pitch->pitch_id) selected @endif>
                {{$each->name}}
            </option>
        @endforeach
    </select>
    <br>
    Sân to 11 người
    <input type="radio" name="size" value="2" @if($pitch->size ==2) checked @endif>


    <br>
    @include('error')
    @if(session()->has('message'))
        {{session()->get('message')}}
        <br>
    @endif
    <button>Sửa</button>
</form>
@endsection
