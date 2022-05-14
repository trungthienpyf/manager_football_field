<?php

namespace App\Http\Controllers;




use App\Models\Category_people;
use Illuminate\Http\Request;

class CategoryPeopleController extends Controller
{
    public function index(){
        $category= Category_people::all();
        return view('category.index',[
            'category' => $category
        ]);
    }
    public function create(){

        return view('category.create');
    }
    public function edit(Category_people $category){
        return view('category.edit',[
            'category' => $category
        ]);
    }
    public function store(Request $request){
        $category = new Category_people();

        $category->name_category=$request->name;

        $category->save();
        return redirect()->route('category_people.index');
    }

    public function update(Request $request,Category_people $category){

        $category->name_category=$request->name;

        $category->update();
        return redirect()->route('category_people.index');
    }
    public function destroy(Category_people $category){
        $category->delete();
        return redirect()->route('category_people.index');
    }
}
