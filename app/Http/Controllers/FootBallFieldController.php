<?php

namespace App\Http\Controllers;


use App\Enums\FootBallFieldStatusEnum;


use App\Http\Requests\FootBallField\StoreRequest;
use App\Models\Area;
use App\Models\CategoryPeople;
use App\Models\FootBallField;

use Illuminate\Support\Facades\Storage;


class FootBallFieldController extends Controller
{




    public function index()
    {
        $football_field = FootBallField::all();
        $status = FootBallFieldStatusEnum::getArrayView();

        return view('football_field.index', [
            'football_field' => $football_field,
            'status'=>$status
        ]);
    }

    public function create()
    {
        $status = FootBallFieldStatusEnum::getArrayView();
        $area = Area::all();
        $category_people = CategoryPeople::all();

        return view('football_field.create', [
            'area' => $area,
            'category_people' => $category_people,
            'status' => $status
        ]);
    }

    public function store(StoreRequest $request)
    {
        $category = new FootBallField();
        $files = $request->file('img');
        $path='';
        if (!empty($files)){
            $path = Storage::disk('public')->putFile('images', $request->file('img'));
        }



        $arr = $request->validated();
        $arr['img'] = $path;
        $category->fill($arr);

        $category->save();
        return redirect()->route('football_field.index');
    }

    public function edit(FootBallField $category)
    {
        return view('football_field.edit', [
            'football_field' => $category
        ]);
    }

    public function update(UpdateRequest $request, FootBallField $football_field)
    {

//        $path = Storage::disk('public')->putFile('images', $request->file('img'));
//        $arr=$request->validated();
//        $arr['img']=$path;
//        $football_field->fill($arr);
//
//        $football_field->update();
        return redirect()->route('football_field.index');
    }

    public function destroy(DestroyRequest $request, $football_field)
    {
//        FootBallField::query()->select('img')->where('id',$category)
//        $category->delete();
        FootBallField::destroy($football_field);
        return redirect()->route('football_field.index');
    }
}
