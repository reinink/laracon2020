<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return inertia('Dashboard');
    }
}
