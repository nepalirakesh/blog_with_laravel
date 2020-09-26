<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $categories=Category::all();
        return view('category.category_home')->with('categories',$categories);
    }



    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required|alpha|unique:categories,type'
        ]);

        $category = new Category();
        $category->type=$request->get('type');
        $category->save();

        return redirect()->route('category.index')->with('success','category successfully added');
    }






}
