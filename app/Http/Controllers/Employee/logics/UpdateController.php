<?php

namespace App\Http\Controllers\Employee\logics;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class UpdateController extends Controller
{
    public function update(Request $request, $id)
    {
        $existingData = Employee::find($id);

        if (!$existingData) {
            return redirect()->route('employees')
                ->with('error_message', 'data dengan id '.$id.' tidak ditemukan');
        } 

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email|unique:employees,email,'.$id,
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
        
        $existingData->update($array);
        
        return redirect()->route('employee.show', $id)
            ->with('success_message', 'Berhasil mengupdate data');
    }
}