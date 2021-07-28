<?php

namespace App\Http\Controllers\Company\views;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function create()
    {
        return view('company.create');
    }
}