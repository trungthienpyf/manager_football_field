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
<form action="{{route('football_field.update',$football_field)}} " method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    Tên thể loại
    <input type="text" name="name" value="{{$football_field->name}}">
    <br>
    Giá
    <input type="number" name="price" value="{{$football_field->price}}">
    <br>
    Ảnh
    <input type="file" name="img"  value="abvc">
    <br>
    @if($football_field->img ==='')
        @else
    Ảnh củ
    <img src="{{ url('/storage') }}/{{$football_field->img}}" alt="" width="100px" >
        <input  type="file" name="img_old" value="{{$football_field->img}}">
        <br>
    @endif

    Khu vực
    <select name="area_id">
        @foreach($area as $each)
            <option value="{{$each->id}}"
                    @if ($football_field->area_id===$each->id)
                    checked
                     @endif>
                {{$each->name}}
            </option>
        @endforeach
    </select>
    <br>
    Trạng thái
    @foreach($status as $key => $value)
        <input type="radio" name="status" value="{{ $value }}"
               @if ($football_field->status===$value)
               checked
            @endif
        >
        {{$key}}
    @endforeach
    <br>
    Loại người
    <select name="category_id">
        @foreach($category_people as $each)
            <option value="{{$each->id}}"
                    @if ($football_field->category_id===$each->id)
                    checked
                @endif
            >
                {{$each->name_category}}
            </option>
        @endforeach
    </select>
    <br>
    @include('error')
    <button>Submit</button>
</form>
</body>
</html>
