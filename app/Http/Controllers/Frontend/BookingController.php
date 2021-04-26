<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showCar($id)
    {
        $car=Product::find($id);
        return view('frontend.layouts.car-show',compact('car'));
    }

    public function booking(Request $request)
    {
        $car=Product::find($request->car_id);
        $daysCalculate=strtotime($request->to_date)-strtotime($request->from_date);
        $daysCalculate=round($daysCalculate / (60 * 60 * 24));
            Booking::create([
               'car_id'=>$request->car_id,
                'user_id'=>auth()->user()->id,
                'booking_from'=>$request->from_date,
                'booking_to'=>$request->to_date,
                'details'=>$request->details,
                'rate'=>$car->price,
                'total'=>$car->price*$daysCalculate,
            ]);

            return redirect()->back()->with('message','Booking created Successfully');
    }
}
