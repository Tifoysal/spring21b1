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
        $product=Product::with('productCategory')->paginate(10);
        return view('backend.layouts.product.list',compact('title','product'));
    }

    public function createForm()
    {
        $title="Create Product";
        $categories=Category::all();
//        dd($categories);
        return view('backend.layouts.product.create',compact('title','categories'));
    }

    public function create(Request $request)
    {
        $file_name='';
        //step 1 check if request has file
        if($request->hasFile('product_image'))
        {
            //file valid or not
            $file=$request->file('product_image');
            if($file->isValid())
            {
                //generate file name
                $file_name=date('Ymdhms').'.'.$file->getClientOriginalExtension();
                //store into local directory
                $file->storeAs('products',$file_name);
            }
        }


        Product::create([
           'name'=>$request->product_name,
           'price'=>$request->product_price,
           'quantity'=>$request->product_qty,
            'category_id'=>$request->category_id,
            'image'=>$file_name
        ]);

        return redirect()->route('product.list')->with('success','Product Created Successfully.');
    }
}
