<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;


class CustomerController extends Controller
{

    public function import(Request $request)
    {

        if ($request->hasFile('file')) {
            foreach ($request->file as $file) {
                $toReplace = array("”", "female");
                $replacer = array('"', "ms");
                $fileToFix = str_replace($toReplace, $replacer, file_get_contents($file));
                $miniFix = str_replace("male", "mr", $fileToFix);
                $temp = tmpfile();
                fwrite($temp, $miniFix);
                $tmpfile_path = stream_get_meta_data($temp)['uri'];
                Excel::import(new CustomerImport, $tmpfile_path, null, \Maatwebsite\Excel\Excel::CSV);

            }
        }
        return "Records are imported successfully";
    }


    public function importForm()
    {
        return view('import-form');
    }

    public function index()
    {
        //pattern to verify valid email address
        $pattern = '^[^@]+@[^@]+.[^@]{2,}$';

        return $customer = Customer::where('email', 'regexp', $pattern)->paginate(20);

    }

    public function pagination()
    {
        return view('customers-view');
    }

}
