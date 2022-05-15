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
        <th>Name</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    @foreach ($area as $each)
        <tr>
            <td>{{$each->id}}</td>
            <td>{{$each->name}}</td>
            <td><a href=" {{route('area.edit',$each)}}">Sửa</a></td>
            <td>
                <form action="{{route('area.destroy',$each)}}" method="post" >
                    @csrf
                    @method('delete')
                    <button>Delete</button>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>

            </td>
        </tr>
    @endforeach
</table>
<a href="{{route('area.create')}}">Create</a>
</body>
</html>
