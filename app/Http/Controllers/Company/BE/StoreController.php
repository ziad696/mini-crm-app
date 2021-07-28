<?php

namespace App\Http\Controllers\Company\BE;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Company;

class StoreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email|unique:companies,email',
            'website' => 'nullable|string',
        ]);

        $array = $request->only([
            'name', 
            'email', 
            'website'
        ]);
        
        $data = Company::create($array);
        
        return redirect()->route('companies')
            ->with('success_message', 'Berhasil menambah data');
    }
}