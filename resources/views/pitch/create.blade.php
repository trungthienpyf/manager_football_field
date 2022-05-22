<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('pitch.store')}} " method="post" enctype="multipart/form-data">
    @csrf
    Tên thể loại
    <input type="text" name="name">
    <br>
    Giá
    <input type="number" name="price">
    <br>
    Ảnh
    <input type="file" name="img">
    <br>
    Khu vực
    <select name="area_id">
        @foreach($area as $each)
            <option value="{{$each->id}}">
                {{$each->name}}
            </option>
        @endforeach
    </select>
    <br>
    Trạng thái
    @foreach($status as $key => $value)
        <input type="radio" name="status" value="{{ $value }}"
               @if ($loop->first)
            checked
            @endif
        >
        {{$key}}
    @endforeach
    <br>
    Loại sân:

    Sân nhỏ 7 người
    <input type="radio" name="size" value="1"> Thuộc sân

    <select name="pitch_id">
        <option checked  value="" >Hãy chọn sân to</option>
        @foreach($size_11 as $each)

            <option value="{{$each->id}}">
                {{$each->name}}
            </option>
        @endforeach
    </select>
    <br>
    Sân to 11 người
    <input type="radio" name="size" value="2">



    <br>
    @include('error')
    @if(session()->has('message'))
        {{session()->get('message')}}
        <br>
    @endif
    <button>Submit</button>
</form>
</body>
</html>
