<?php

namespace App\Http\Controllers;


use App\Enums\PitchSizeEnum;
use App\Enums\PitchStatusEnum;


use App\Http\Requests\Pitch\DestroyRequest;
use App\Http\Requests\Pitch\StoreRequest;
use App\Http\Requests\Pitch\UpdateRequest;
use App\Models\Area;
use App\Models\Pitch;
use App\Models\Size;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PitchController extends Controller
{

    public function index()
    {
        $pitch = Pitch::query()->orderBy('created_at','desc')->paginate('5');
        $status = PitchStatusEnum::getArrayView();

        return view('admin.pitch.index', [
            'pitch' => $pitch,
            'status'=>$status
        ]);
    }

    public function create()
    {
        $status = PitchStatusEnum::getArrayView();
        $area = Area::all();

        $get_size_11=Pitch::query()
            ->where('size','=','2')
            ->orderBy('created_at','DESC')
            ->get();


        return view('admin.pitch.create', [
            'area' => $area,

            'status' => $status
        ]);
    }

    public function store(StoreRequest $request)
    {
        $pitch_id=$request->pitch_id;
        if(!empty($pitch_id)){
            $a=Pitch::select('*')
                ->where('pitch_id','=',$pitch_id)
                ->get();
            if(count($a)>=4){
                return redirect()->route('admin.pitch.create')->with(['message'=>'Sân to này đã chứa đủ sân nhỏ hãy chọn sân khác']);
            }
        }
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

        $id=$pitch->id;
        if($request->create_child){
            $data = [
                ['name'=>$arr['name'].' 01','price'=>$arr['price'],'img'=>$arr['img'],'area_id'=>$arr['area_id'],'status'=>PitchStatusEnum::TRONG,'size'=>PitchSizeEnum::SAN_7,'pitch_id'=>$id],
                ['name'=>$arr['name'].' 02','price'=>$arr['price'],'img'=>$arr['img'],'area_id'=>$arr['area_id'],'status'=>PitchStatusEnum::TRONG,'size'=>PitchSizeEnum::SAN_7,'pitch_id'=>$id],
                ['name'=>$arr['name'].' 03','price'=>$arr['price'],'img'=>$arr['img'],'area_id'=>$arr['area_id'],'status'=>PitchStatusEnum::TRONG,'size'=>PitchSizeEnum::SAN_7,'pitch_id'=>$id],
                ['name'=>$arr['name'].' 04','price'=>$arr['price'],'img'=>$arr['img'],'area_id'=>$arr['area_id'],'status'=>PitchStatusEnum::TRONG,'size'=>PitchSizeEnum::SAN_7,'pitch_id'=>$id],
            ];

            Pitch::insert($data);
        }
        return redirect()->route('admin.pitch.index');
    }

    public function edit(Pitch $pitch)
    {

        $area = Area::all();
        $status = PitchStatusEnum::getArrayView();
        $get_size_11=Pitch::query()
            ->where('size','=','2')
            ->orderBy('created_at','DESC')
            ->get();
        return view('admin.pitch.edit', [
            'pitch' => $pitch,
            'area'=>$area,
            'status'=>$status,
            'size_11'=>$get_size_11
        ]);
    }

    public function update(UpdateRequest $request, Pitch $pitch)
    {
        $files = $request->file('img');

        if(!empty($files)){
            $path = Storage::disk('public')->putFile('images', $files);
            $arr=$request->validated();
            $arr['img']=$path;
            $pitch->fill($arr);
            $query= Pitch::select('img')->where('id',$pitch->id)->get();
            $img_explode =explode('/',$query)[1];

            $img =explode('"',$img_explode)[0];
            $link="images/".$img;

            Storage::disk('public')->delete($link);
            $pitch->update();
        }else{
            $path='';
            if(!empty( $request->img_old)){
                $path = $request->img_old;
            }
            $arr=$request->validated();
            $arr['img']=$path;
            $pitch->fill($arr);
            $pitch->update();
        }
        return redirect()->route('admin.pitch.index');
    }

    public function destroy(DestroyRequest $request, $pitch)
    {
            $query= Pitch::select('img')->where('id',$pitch)->value('img');
            if(!empty($query)){
                $img_explode =explode('/',$query)[1];
                $img =explode('"',$img_explode)[0];
                $link="images/".$img;
                Storage::disk('public')->delete($link);

            }
            Pitch::destroy($pitch);
            return response()->json(['success'=>'thanh cong',]);
    }
    public function CreatePitchMultiple(StoreRequest $request)
    {

        $pitch_id=$request->pitch_id;
        if(!empty($pitch_id)){
            $a=Pitch::select('*')
                ->where('pitch_id','=',$pitch_id)
                ->get();
            if(count($a)>=4){
                return redirect()->route('admin.pitch.create')->with(['message'=>'Sân to này đã chứa đủ sân nhỏ hãy chọn sân khác']);
            }
        }
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
        $id=$pitch->id;
        if($request->create_child){
            $data = [
                ['name'=>$arr['name'].' 01','price'=>$arr['price'],'img'=>$arr['img'],'area_id'=>$arr['area_id'],'status'=>PitchStatusEnum::TRONG,'size'=>PitchSizeEnum::SAN_7,'pitch_id'=>$id],
                ['name'=>$arr['name'].' 02','price'=>$arr['price'],'img'=>$arr['img'],'area_id'=>$arr['area_id'],'status'=>PitchStatusEnum::TRONG,'size'=>PitchSizeEnum::SAN_7,'pitch_id'=>$id],
                ['name'=>$arr['name'].' 03','price'=>$arr['price'],'img'=>$arr['img'],'area_id'=>$arr['area_id'],'status'=>PitchStatusEnum::TRONG,'size'=>PitchSizeEnum::SAN_7,'pitch_id'=>$id],
                ['name'=>$arr['name'].' 04','price'=>$arr['price'],'img'=>$arr['img'],'area_id'=>$arr['area_id'],'status'=>PitchStatusEnum::TRONG,'size'=>PitchSizeEnum::SAN_7,'pitch_id'=>$id],
            ];

            Pitch::insert($data);
        }
        return redirect()->route('admin.area.index');
    }
}
