<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showBooking()
    {
        $allBooking=Booking::with(['user','car'])->get();
//        dd($allBooking);
        return view('backend.layouts.booking.list',compact('allBooking'));
    }
}
