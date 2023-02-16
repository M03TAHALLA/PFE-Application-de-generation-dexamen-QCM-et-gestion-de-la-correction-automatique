<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SolutionsImport;

class ImportExcelController extends Controller
{
    function index()
    {
        $data = DB::table('solutions')->orderBy('id', 'DESC')->get();
        return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $import = new SolutionsImport();
        Excel::import($import, $path);

        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
