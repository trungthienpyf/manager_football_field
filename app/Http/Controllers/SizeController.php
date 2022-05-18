<?php

namespace App\Http\Controllers;




use App\Http\Requests\Size\DestroyRequest;
use App\Http\Requests\Size\StoreRequest;
use App\Http\Requests\Size\UpdateRequest;
use App\Models\Size;


class SizeController extends Controller
{
    public function index(){
        $size= Size::all();
        return view('size.index',[
            'size' => $size
        ]);
    }
    public function create(){

        return view('size.create');
    }

    public function store(StoreRequest $request){
        $size=new Size();

        $size->fill($request->validated());

        $size->save();
        return redirect()->route('size.index');
    }
    public function edit(Size $size){
        return view('size.edit',[
            'size' => $size
        ]);
    }
    public function update(UpdateRequest $request, Size $size){

        $size->fill($request->validated());

        $size->update();
        return redirect()->route('size.index');
    }
    public function destroy(DestroyRequest $request, $size){
//        $category->delete();
        Size::destroy($size);
        return redirect()->route('size.index');
    }
}
