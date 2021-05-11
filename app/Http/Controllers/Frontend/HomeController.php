<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $data=[];
    public function home($product_id)
    {
        $products=Product::where('product_id',$product_id)->first();
        $getData=$this->recursive($products->product_id);
        return $getData;
    }

    public function recursive($productId)
    {
        $morebuy=Product::where('product_id',$productId)->first();
            if($morebuy)
            {
                $this->data[$morebuy->id]['product_id']=$morebuy->product_id;
                $this->data[$morebuy->id]['morebuy_product_id']=$morebuy->morebuy_product_id;
                $this->recursive($morebuy->morebuy_product_id);
            }
        return $this->data;
    }
}
