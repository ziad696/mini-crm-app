<?php

namespace App\Http\Controllers\Employee\FE;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CreateController extends Controller
{
    public function create()
    {
        $options = Company::orderBy('name', 'ASC')->pluck('id', 'name');
        
        return view('employee.create', [
            'companies' => $options
        ]);
    }
}