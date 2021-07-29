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
        
        $data = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
        ]);

        if($request->logo){

            $imageName = 'company_logo_'.$data->id.'.'.$request->file('logo')->extension(); 

            $path = $request->file('logo')->storeAs('public/company/logo', $imageName);

            $url_logo = URL::to('').'/storage/company/logo/'.$imageName;
            
            $data->update([
                'logo' => $url_logo,
            ]);
        }

        if($request->email){
            $company = [
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
            ];
    
            \Mail::to($request->email)->send(new \App\Mail\NewCompanyEnteredMail($company));
        }
        
        return redirect()->route('companies')
            ->with('success_message', 'Berhasil menambah data');
    }
}