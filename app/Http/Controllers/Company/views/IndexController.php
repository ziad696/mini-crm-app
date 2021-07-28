<?php

namespace App\Http\Controllers\Company\views;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Company;
use DataTables;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datas = Company::all();

            return Datatables::of($datas)
                    ->addIndexColumn()
                    ->editColumn('logo', function($row) {

                        if(!$row->logo){
                            $row->logo = asset('images/404.jpg');
                        }

                        $logo = '<img class="img-fluid pad" src="'.$row->logo.'" alt="Company Logo">';
                        return $logo;
                    })
                    ->addColumn('action', function($row){
                        
                        $action = '<a href="'.route("company.show", $row->id).'" title="Details" class="btn btn-xs btn-default text-teal mx-1 shadow">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    <a href="'.route("company.destroy", $row->id).'" onclick="notificationBeforeDelete(event, this)" title="Delete" class="btn btn-xs btn-default text-danger mx-1 shadow">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </a>';

                        return $action;
                    })
                    ->rawColumns(['logo', 'action'])
                    ->make(true);
        }

        return view('company.index');
    }
}