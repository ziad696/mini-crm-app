<?php

namespace App\Http\Controllers\Company\FE;

use App\Http\Controllers\Controller;
use App\Models\Company;

class IndexController extends Controller
{
    public function index()
    {
        $datas = Company::latest()->get();
        
        return view('company.index', [
            'companies' => $datas
        ]);
    }
}