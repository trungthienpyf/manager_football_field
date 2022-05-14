<?php

namespace App\Http\Controllers;



use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    private string $table='area';
   public function index(){
      $area= Area::all();
       return view('area.index',[
           'area' => $area
       ]);
   }
    public function create(){

        return view('area.create');
    }
    public function store(Request $request){
        $area = new Area();

        $area->name=$request->name;

        $area->save();
        return redirect()->route('area.index');
    }
    public function edit(Area $area){
        return view('area.edit',[
            'area' => $area
        ]);
    }
    public function update(Request $request,Area $area){

        $area->name=$request->name;

        $area->update();
        return redirect()->route('area.index');
    }
    public function destroy(Area $area){
        $area->delete();
        return redirect()->route('area.index');
    }
}
