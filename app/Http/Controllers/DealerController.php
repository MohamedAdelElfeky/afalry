<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class DealerController extends Controller
{
    public function index()
    {
        return view('pages.dashboards.dealers.index');
    }
}
