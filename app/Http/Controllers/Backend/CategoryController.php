<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        //select * from categories;
        $categories=Category::all();
        $title='Category List';
//        dd($categories);
        return view('backend.layouts.category.list',compact('categories','title'));
    }

    public function create(Request $request)
    {
        //insert into database using laravel eloquent
        Category::create([
           'name'=> $request->category_name,
            'description'=>$request->description
        ]);

        return redirect()->back();

    }
}
