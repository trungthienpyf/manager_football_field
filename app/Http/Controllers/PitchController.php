<?php

namespace App\Http\Controllers;


use App\Enums\PitchStatusEnum;


use App\Http\Requests\Pitch\DestroyRequest;
use App\Http\Requests\Pitch\StoreRequest;
use App\Http\Requests\Pitch\UpdateRequest;
use App\Models\Area;
use App\Models\Pitch;
use App\Models\Size;



use Illuminate\Support\Facades\Storage;


class PitchController extends Controller
{

    public function index()
    {
        $pitch = Pitch::all();
        $status = PitchStatusEnum::getArrayView();

        return view('pitch.index', [
            'pitch' => $pitch,
            'status'=>$status
        ]);
    }

    public function create()
    {
        $status = PitchStatusEnum::getArrayView();
        $area = Area::all();
        $size = Size::all();

        return view('pitch.create', [
            'area' => $area,
            'size' => $size,
            'status' => $status
        ]);
    }

    public function store(StoreRequest $request)
    {
        $pitch = new Pitch();
        $files = $request->file('img');
        $path='';
        if (!empty($files)){
            $path = Storage::disk('public')->putFile('images', $request->file('img'));
        }
        $arr = $request->validated();
        $arr['img'] = $path;
        $pitch->fill($arr);

        $pitch->save();
        return redirect()->route('pitch.index');
    }

    public function edit(Pitch $pitch)
    {
        $area = Area::all();
        $status = PitchStatusEnum::getArrayView();
        $size = Size::all();
        return view('pitch.edit', [
            'pitch' => $pitch,
            'area'=>$area,
            'status'=>$status,
            'size'=>$size,
        ]);
    }

    public function update(UpdateRequest $request, Pitch $pitch)
    {
        $files = $request->file('img');
        $path = '';
        if(!empty($files)){
            $path = Storage::disk('public')->putFile('images', $files);
        }
        $arr=$request->validated();
        $arr['img']=$path;
        $pitch->fill($arr);
        $query= Pitch::select('img')->where('id',$pitch->id)->get();
        $img_explode =explode('/',$query)[1];
        $img =explode('"',$img_explode)[0];
        $link="images/".$img;
        Storage::disk('public')->delete($link);
        $pitch->update();


        return redirect()->route('pitch.index');

    }

    public function destroy(DestroyRequest $request, $pitch)
    {
        $query= Pitch::select('img')->where('id',$pitch)->get();

        if(count($query)>1){
            $img_explode =explode('/',$query)[1];
            $img =explode('"',$img_explode)[0];
            $link="images/".$img;
            Storage::disk('public')->delete($link);
        }


        Pitch::destroy($pitch);
        return redirect()->route('pitch.index');
    }
}
