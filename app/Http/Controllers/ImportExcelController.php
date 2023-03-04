<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    function index()
    {
     $data = DB::table('tbl_employee')->orderBy('id', 'DESC')->get();
     return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

         $data = Excel::load($path)->get();

         

         DB::table('tbl_employee')->delete();

 

     if($data->count() > 0)
     {

      foreach($data->toArray() as $key => $value)
      {
       
              $insert_data[] = array(
               'Name'  => $value['name'],
               'NetSalarry'   => $value['netsalarry'],
               'DateOfatten'   => $value['dateofatten'],
               'Day'    => $value['day'],
               'Status'  => $value['status'],
               
              );
       
      }

      if(!empty($insert_data))
      {
       DB::table('tbl_employee')->insert($insert_data);
      }
     }
     return back()->with('success',trans('admin.datainsertsusfully'));
    }
}

