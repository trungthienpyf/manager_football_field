<?php

namespace App\Http\Controllers;
use App\Http\Requests\Area\DestroyRequest;
use App\Http\Requests\Area\StoreRequest;
use App\Http\Requests\Area\UpdateRequest;
use App\Models\Area;

class AreaController extends Controller
{

   public function index(){
      $area= Area::all();
       return view('admin.area.index',[
           'area' => $area
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
        return response()->json(['success'=>'thanh cong',]);
    }
}
