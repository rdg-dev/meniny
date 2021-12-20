<?php

namespace App\Http\Controllers;

use App\Services\CalendarApi;

class SearchController extends Controller
{
    public function index($searchValue)
    {
        $result = CalendarApi::searchByName($searchValue)->get();

        return response()->json($result, 200);
    }
}
