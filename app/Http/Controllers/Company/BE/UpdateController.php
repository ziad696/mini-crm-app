<?php

namespace App\Http\Controllers\Company\BE;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Company;

class UpdateController extends Controller
{
    public function update(Request $request, $id)
    {
        $existingData = Company::find($id);

        if (!$existingData) {
            return redirect()->route('companies')
                ->with('error_message', 'data dengan id '.$id.' tidak ditemukan');
        } 

        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email|unique:companies,email,'.$id,
            'website' => 'nullable|string',
        ]);

        $array = $request->only([
            'name', 
            'email', 
            'website'
        ]);
        
        $existingData->update($array);
        
        return redirect()->route('company.show', $id)
            ->with('success_message', 'Berhasil mengupdate data');
    }
}