<?php

namespace App\Http\Controllers;


use App\Enums\FootBallFieldStatusEnum;


use App\Http\Requests\FootBallField\DestroyRequest;
use App\Http\Requests\FootBallField\StoreRequest;
use App\Http\Requests\FootBallField\UpdateRequest;
use App\Models\Area;
use App\Models\CategoryPeople;
use App\Models\FootBallField;

use Illuminate\Support\Facades\DB;
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

    public function edit(FootBallField $football_field)
    {
        $area = Area::all();
        $status = FootBallFieldStatusEnum::getArrayView();
        $category_people = CategoryPeople::all();
        return view('football_field.edit', [
            'football_field' => $football_field,
            'area'=>$area,
            'status'=>$status,
            'category_people'=>$category_people,
        ]);
    }

    public function update(UpdateRequest $request, FootBallField $football_field)
    {
        $files = $request->file('img');
        $path = '';
        if(!empty($files)){
            $path = Storage::disk('public')->putFile('images', $files);
        }
        $arr=$request->validated();
        $arr['img']=$path;
        $football_field->fill($arr);
        $query= FootBallField::select('img')->where('id',$football_field->id)->get();
        $img_explode =explode('/',$query)[1];
        $img =explode('"',$img_explode)[0];
        $link="images/".$img;
        Storage::disk('public')->delete($link);
        $football_field->update();


        return redirect()->route('football_field.index');

    }

    public function destroy(DestroyRequest $request, $football_field)
    {
        $query= FootBallField::select('img')->where('id',$football_field)->get();

        if(count($query)>1){
            $img_explode =explode('/',$query)[1];
            $img =explode('"',$img_explode)[0];
            $link="images/".$img;
            Storage::disk('public')->delete($link);
        }


        FootBallField::destroy($football_field);
        return redirect()->route('football_field.index');
    }
}
