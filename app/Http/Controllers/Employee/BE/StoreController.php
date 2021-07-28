<?php

namespace App\Http\Controllers\Employee\BE;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class StoreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email|unique:employees,email',
            'phone' => 'nullable|string',
            'company_id' => 'required|int',
        ]);

        $array = $request->only([
            'first_name',
            'last_name',
            'email',
            'phone',
            'company_id',
        ]);
        
        $data = Employee::create($array);
        
        return redirect()->route('employees')
            ->with('success_message', 'Berhasil menambah data');
    }
}