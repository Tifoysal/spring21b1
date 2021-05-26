<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function bookingReport()
    {
        $allBooking=[];
        $fromDate=null;
        $toDate=null;

        if(isset($_GET['from_date']) && isset($_GET['to_date']) )
        {
            $fromDate=date('Y-m-d',strtotime($_GET['from_date']));
            $toDate=date('Y-m-d',strtotime($_GET['to_date']));

//            $allBooking=Booking::whereDate('booking_from',$fromDate)->get();
            $allBooking=Booking::whereBetween('booking_from',[$fromDate,$toDate])->get();
//            dd($allBooking);
        }

        return view('backend.layouts.reports.booking',compact('allBooking','fromDate','toDate'));
    }
}
