<span>
    @foreach ($pitch as $each)
        <h1>{{$each->name}}</h1>
        <img src="{{ url('/storage') }}/{{$each->img}}" alt="">
       <p> Giá {{$each->price}}VNĐ</p>
        <a href="{{route('checkout',$each)}}">Đặt sân</a>
    @endforeach
</span>
