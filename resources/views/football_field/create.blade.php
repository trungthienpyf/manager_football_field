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
<form action="{{route('football_field.store')}} " method="post" enctype="multipart/form-data">
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
    Chọn khu vực
    @foreach($area as $each)
    <select name="area_id" >
        <option value="{{$each->id}}">
        {{$each->name}}
        </option>
    </select>
    @endforeach
    <br>
    Chọn thể loại người
    @foreach($category_people as $each)
        <select name="category_people" >
            <option value="{{$each->id}}">
                {{$each->name_category}}
            </option>
        </select>
    @endforeach
    <br>
    <button>Submit</button>
</form>
</body>
</html>
