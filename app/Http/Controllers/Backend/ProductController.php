<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $title='Product List';
        $product=Product::all();
        return view('backend.layouts.product.list',compact('title','product'));
    }

    public function createForm()
    {
        $title="Create Product";
        $categories=Category::all();
//        dd($categories);
        return view('backend.layouts.product.create',compact('title','categories'));
    }

    public function create(Request  $request)
    {
        Product::create([
           'name'=>$request->product_name,
           'price'=>$request->product_price,
           'quantity'=>$request->product_qty,
            'category_id'=>$request->category_id

        ]);

        return redirect()->route('product.list');
    }
}
