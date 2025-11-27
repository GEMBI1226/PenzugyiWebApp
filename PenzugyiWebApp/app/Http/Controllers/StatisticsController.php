<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StatisticsController extends Controller
{
    /**
     * Display the statistics page.
     */
    public function index(): View
    {
        return view('statistics.index');
    }
}
