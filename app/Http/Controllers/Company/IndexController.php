<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Company;

class IndexController extends Controller
{
    public function index()
    {
        return view('company.index');
    }
}