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
<form action="{{route('category_people.update',$category)}} " method="post">
    @csrf
    @method('put')
    Tên khu vực
    <input type="text" name="name" value="{{$category->name_category}}">
    <br>
    <button>Submit</button>
</form>
</body>
</html>
