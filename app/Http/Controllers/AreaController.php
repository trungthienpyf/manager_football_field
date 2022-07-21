<?php

namespace App\Http\Controllers;
use App\Enums\PitchSizeEnum;
use App\Enums\PitchStatusEnum;
use App\Http\Requests\Area\DestroyRequest;
use App\Http\Requests\Area\StoreRequest;

use App\Http\Requests\Area\UpdateRequest;
use App\Models\Area;
use App\Models\Pitch;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


class AreaController extends Controller
{
    public function __construct(){
        $this->table=(new Area())->getTable();
        View::share('title',ucwords($this->table));
    }

   public function index(){
      $area= Pitch::query()
          ->selectRaw('areas.name as name,areas.id,count(pitches.id) as countPitch')
          ->rightJoin('areas','areas.id','=','pitches.area_id')
          ->whereNull('deleted_at')
          ->groupBy('areas.id')
          ->orderBy('areas.created_at','DESC')
          ->get();

       $status = PitchStatusEnum::getArrayView();
       $get_size_11=Pitch::query()
           ->where('size','=','2')
           ->orderBy('created_at','DESC')
           ->get();

       return view('admin.area.index',[
           'area' => $area,
           'status'=>$status,
           'size_11'=>$get_size_11,
       ]);
   }
    public function create(){

        return view('admin.area.create');
    }
    public function store(StoreRequest $request){
        $area = new Area();

        $area->fill($request->validated());

        $area->save();
        return redirect()->route('admin.area.index');
    }
    public function edit(Area $area){


        return view('admin.area.edit', [
            'area' => $area
        ]);
    }
    public function update(UpdateRequest $request,Area $area){

        $area->fill($request->validated());

        $area->update();
        return redirect()->route('admin.area.index');
    }
    public function destroy(DestroyRequest $request, $area){
//        $area->delete();

        Area::destroy($area);
//        Area::where('id','=',$area)->delete();

        return response()->json(['success'=>'thanh cong',]);
    }


}
