<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $title='Home';
        return view('backend.master',compact('title'));
    }
}
