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
        $car = Product::find($id);
        return view('frontend.layouts.car-show', compact('car'));
    }

    public function booking(Request $request)
    {
        $car = Product::find($request->car_id);
        $daysCalculate = strtotime($request->to_date) - strtotime($request->from_date);
        $daysCalculate = round($daysCalculate / (60 * 60 * 24));
        //need to check the room/ the flat/ car/ bike is available to booked or not
        $fromDate = date("Y-m-d", strtotime($request->from_date));
        $toDate = date("Y-m-d", strtotime($request->to_date));

        $checkBook = Booking::query()->where('car_id', $request->car_id);
        //            ->where('user_id',auth()->user()->id) // for this user
//                    ->where('slot_id',$request->slot_id) //for specific slot

        $checkBook->where(function ($query) use ($fromDate, $toDate) {
            $query->whereBetween('booking_from', [$fromDate, $toDate])
                ->orWhereBetween('booking_to', [$fromDate, $toDate]);
        });
        $checkBook = $checkBook->get();

        if ($checkBook->count() == 0) {
            //if available then create booking/reservation
            Booking::create([
                'car_id' => $request->car_id,
                'user_id' => auth()->user()->id,
                'booking_from' => $request->from_date,
                'booking_to' => $request->to_date,
                'details' => $request->details,
                'rate' => $car->price,
                'total' => $car->price * $daysCalculate,
            ]);
            return redirect()->back()->with('message', 'Booking created Successfully');
        } else {
            return redirect()->back()->with('message', 'Already booked.');
        }


    }
}
