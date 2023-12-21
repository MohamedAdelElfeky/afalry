<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function admins()
    {
        return view('pages.dashboards.admin.index');
    }
    public function users()
    {
        return view('pages.dashboards.users.index');
    }
}
