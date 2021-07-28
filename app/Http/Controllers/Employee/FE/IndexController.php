<?php

namespace App\Http\Controllers\Employee\FE;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class IndexController extends Controller
{
    public function index()
    {
        $datas = Employee::latest()->get();
        
        return view('employee.index', [
            'employees' => $datas
        ]);
    }
}