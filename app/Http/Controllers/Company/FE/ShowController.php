<?php

namespace App\Http\Controllers\Company\FE;

use App\Http\Controllers\Controller;
use App\Models\Company;

class ShowController extends Controller
{
    public function show($id)
    {
        $data = Company::find($id);

        if (!$data) {
            return redirect()->route('companies')
                ->with('error_message', 'data dengan id '.$id.' tidak ditemukan');
        } 
        
        return view('company.show', [
            'company' => $data
        ]);
    }
}