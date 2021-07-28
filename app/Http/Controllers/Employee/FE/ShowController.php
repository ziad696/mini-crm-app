<?php

namespace App\Http\Controllers\Employee\FE;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Company;

class ShowController extends Controller
{
    public function show($id)
    {
        $data = Employee::find($id);

        if (!$data) {
            return redirect()->route('employees')
                ->with('error_message', 'data dengan id '.$id.' tidak ditemukan');
        }
        
        $options = Company::orderBy('name', 'ASC')->pluck('id', 'name');
        
        return view('employee.show', [
            'employee' => $data,
            'companies' => $options
        ]);
    }
}