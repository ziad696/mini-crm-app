<?php

namespace App\Http\Controllers\Company\logics;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if($request->logo){

            $imageName = time().'.'.$request->file('logo')->extension(); 

            $path = $request->file('logo')->storeAs('public/company/logo', $imageName);

            $url_logo = URL::to('').'/storage/company/logo/'.$imageName;
        }

        $data = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $url_logo ?? null,
        ]);
        
        return redirect()->route('companies')
            ->with('success_message', 'Berhasil menambah data');
    }
}