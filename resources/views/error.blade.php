@if ($errors->any())

    <div  >
        <ul>
            @foreach ($errors->all() as $error)

                <li class="text-danger" style="list-style: none">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
