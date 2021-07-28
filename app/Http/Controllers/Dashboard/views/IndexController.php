<?php

namespace App\Http\Controllers\Dashboard\views;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
