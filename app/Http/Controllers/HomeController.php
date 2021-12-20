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
            'today'     => date('d. m. Y'),
            'nameday'   => CalendarApi::getNameDayByDate(date('m-d'))
        ]);
    }

    public function show($name)
    {
        $name = str_replace('-', ', ', $name);
        $nameday = CalendarApi::searchByName($name)->first();
        if (!$nameday) abort(404);
        $month = CalendarApi::getNameMonth($nameday->month);

        return view('home.show',[
            'name'          => $nameday->name,
            'dateNameday'   => $nameday->day . '. ' . $month
        ]);
    }

}
