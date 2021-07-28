<?php

namespace App\Http\Controllers\Company\logics;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;

class DestroyController extends Controller
{
    public function destroy($id)
    {
        $data = Company::find($id);

        if (!$data) {
            return redirect()->route('companies')
                ->with('error_message', 'data dengan id '.$id.' tidak ditemukan');
        } 

        if ($data->employees) {
            foreach ($data->employees as $employee) {
                Employee::find($employee['id'])->delete();
            }
        }

        $data->delete();

        return redirect()->route('companies')
            ->with('success_message', 'Berhasil menghapus data');
    }
}