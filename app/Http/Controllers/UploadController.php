<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ModelImport;

class UploadController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new ModelImport, $request->file('file'));

        return back()->with('success', 'File imported successfully!');
    }

    public function access(){
        $trackers = Upload::where('status', 'active')->get();

        return view('dash.Setting' ,compact('trackers'));
    }
}
