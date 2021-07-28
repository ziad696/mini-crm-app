<?php

namespace App\Http\Controllers\Employee\FE;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use DataTables;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datas = Employee::all();

            return Datatables::of($datas)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        
                        $name = $row->first_name.' '.$row->last_name;

                        return $name;
                    })
                    ->addColumn('company_name', function($row){
                        
                        $company_name = $row->company->name;

                        return $company_name;
                    })
                    ->addColumn('action', function($row){
                        
                        $action = '<a href="'.route("employee.show", $row->id).'" title="Details" class="btn btn-xs btn-default text-teal mx-1 shadow">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="'.route("employee.destroy", $row->id).'" onclick="notificationBeforeDelete(event, this)" title="Delete" class="btn btn-xs btn-default text-danger mx-1 shadow">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </a>';

                        return $action;
                    })
                    ->rawColumns(['name', 'company_name', 'action'])
                    ->make(true);
        }

        return view('employee.index');
    }
}