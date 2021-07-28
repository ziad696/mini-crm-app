<?php

namespace App\Http\Controllers\Dashboard\FE;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
