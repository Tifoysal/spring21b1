<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct($id)
    {
       $product=Product::find($id);

       return view('frontend.layouts.single-product');
    }

    public function productsUnderCategory($cid)
    {
       if($cid=='all')
       {
           $products=Product::all();
       }else
       {
           $products=Product::where('category_id',$cid)->get();
       }
       //get all products from product table where category id =$cid

        return view('frontend.layouts.product-under-category',compact('products'));
    }
}
