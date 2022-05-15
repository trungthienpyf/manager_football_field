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
<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Tên</th>
        <th>Hình</th>
        <th>Giá</th>
        <th>Khu vực</th>
        <th>Loại người</th>
        <th>Giá</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    @foreach ($football_field as $each)
        <tr>
            <td>{{$each->id}}</td>
            <td>{{$each->name}}</td>
            <td>{{$each->img}}</td>
            <td>{{$each->price}}</td>
            <td>{{$each->area_id->name}}</td>

            <td><a href=" {{route('football_field.edit',$each)}}">Sửa</a></td>
            <td>
                <form action="{{route('football_field.destroy',$each)}}" method="post" >
                    @csrf
                    @method('delete')
                    <button>Xóa</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<a href="{{route('football_field.create')}}">Create</a>
</body>
</html>
