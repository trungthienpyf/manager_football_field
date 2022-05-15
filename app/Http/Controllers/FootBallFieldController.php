<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryPeople\DestroyRequest;
use App\Http\Requests\CategoryPeople\StoreRequest;
use App\Http\Requests\CategoryPeople\UpdateRequest;
use App\Models\Area;
use App\Models\CategoryPeople;
use App\Models\FootBallField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FootBallFieldController extends Controller
{
    public function index(){
        $football_field= FootBallField::all();
        return view('football_field.index',[
            'football_field' => $football_field
        ]);
    }
    public function create(){
        $area =Area::all();
        $category_people=CategoryPeople::all();
        return view('football_field.create',[
            'area' => $area,
            'category_people'=>$category_people
        ]);
    }

    public function store(StoreRequest $request){
        $category=new FootBallField();

        $path = Storage::disk('public')->putFile('images', $request->file('img'));
        $arr=$request->validated();
        $arr['img']=$path;
        $category->fill($arr);

        $category->save();
        return redirect()->route('football_field.index');
    }
    public function edit(FootBallField $category){
        return view('football_field.edit',[
            'football_field' => $category
        ]);
    }
    public function update(UpdateRequest $request,FootBallField $football_field){

//        $path = Storage::disk('public')->putFile('images', $request->file('img'));
//        $arr=$request->validated();
//        $arr['img']=$path;
//        $football_field->fill($arr);
//
//        $football_field->update();
        return redirect()->route('football_field.index');
    }
    public function destroy(DestroyRequest $request, $category){
//        $category->delete();
        FootBallField::destroy($category);
        return redirect()->route('football_field.index');
    }
}
