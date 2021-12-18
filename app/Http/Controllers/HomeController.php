<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CalendarApi;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index',[
            'todayName' => CalendarApi::getNameToday(),
            'today'     => date('d.m.Y'),
            'nameday'   => CalendarApi::getNameDay(date('m-d'))
        ]);
    }

}
