<?php

namespace App\Http\Controllers\Employee\BE;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class DestroyController extends Controller
{
    public function destroy($id)
    {
        $data = Employee::find($id);

        if (!$data) {
            return redirect()->route('employees')
                ->with('error_message', 'data dengan id '.$id.' tidak ditemukan');
        }

        $data->delete();

        return redirect()->route('employees')
            ->with('success_message', 'Berhasil menghapus data');
    }
}