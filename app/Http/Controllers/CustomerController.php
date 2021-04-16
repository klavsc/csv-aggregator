<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;


class CustomerController extends Controller
{

    public function import(Request $request)
    {
        Excel::import(new CustomerImport,$request->file);
        return "Records are imported successfully";

    }

    public function importForm()
    {
        return view('import-form');
    }


}
