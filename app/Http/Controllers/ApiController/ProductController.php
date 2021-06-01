<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct()
    {
        try {
            $products=Product::all();
            return $this->success($products,'Product List');
        }catch (\Exception $e)
        {
            return $this->failed('something went wrong');
        }
    }

    public function singleProduct($id)
    {
        try {
            $products=Product::find($id);
            return $this->success($products,'Product List');
        }catch (\Exception $e)
        {
            return $this->failed('something went wrong');
        }
    }

    public function createProduct(Request $request)
    {
        try {
            $request->validate([
               'product_price'=>'integer'
            ]);
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

            $new_product=Product::create([
                'name'=>$request->product_name,
                'price'=>$request->product_price,
                'quantity'=>$request->product_qty,
                'category_id'=>$request->category_id,
                'image'=>$file_name
            ]);

            return $this->success($new_product,'Product Created Successfully.');

        }catch (\Exception $e)
        {
            return $this->failed($e->getMessage());
        }



    }
}
