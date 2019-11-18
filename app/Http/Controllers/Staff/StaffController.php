<?php

namespace App\Http\Controllers\Staff;
use App\Http\Controllers\Controller;


class StaffController extends Controller
{
    public function index()
    {
        return view('pages.staff.dashboard');
    }

}
