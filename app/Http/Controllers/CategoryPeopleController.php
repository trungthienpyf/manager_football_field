<?php

namespace App\Http\Controllers;




use App\Http\Requests\CategoryPeople\DestroyRequest;
use App\Http\Requests\CategoryPeople\StoreRequest;
use App\Http\Requests\CategoryPeople\UpdateRequest;

use App\Models\CategoryPeople;


class CategoryPeopleController extends Controller
{
    public function index(){
        $category= CategoryPeople::all();
        return view('category.index',[
            'category' => $category
        ]);
    }
    public function create(){

        return view('category.create');
    }

    public function store(StoreRequest $request){
        $category=new CategoryPeople();

        $category->fill($request->validated());

        $category->save();
        return redirect()->route('category_people.index');
    }
    public function edit(CategoryPeople $category){
        return view('category.edit',[
            'category' => $category
        ]);
    }
    public function update(UpdateRequest $request,CategoryPeople $category){

        $category->fill($request->validated());

        $category->update();
        return redirect()->route('category_people.index');
    }
    public function destroy(DestroyRequest $request, $category){
//        $category->delete();
        CategoryPeople::destroy($category);
        return redirect()->route('category_people.index');
    }
}
