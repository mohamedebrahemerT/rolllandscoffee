<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Students;
use App\newes;
 use File;
 



use DataTables;

class newesController extends Controller
{
      function index()
    {
     return view('Admin.newes.newes');
     //http://127.0.0:8000/ajaxdata
    }

    function getdata()
    {
        
          
     $newes = newes::select('id', 'title', 'adby','desc','continent','');
     return Datatables::of($newes)
 
            ->addColumn('action', function($student){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$student->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="student_checkbox[]" class="student_checkbox" value="{{$id}}" />') 
            ->rawColumns(['checkbox','action','image'])
            ->make(true);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'desc'  => 'required',
            'continent'  => 'required',
             'documents'      => 'required',

        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
             $uploaded='';

            if($request->get('button_action') == "insert")
            {
                 

               if(request()->hasFile('documents')) {

               

        $path = "newes";

        $file_name= request('documents'); 
        $original_file_name = $file_name->getClientOriginalName();

        $extension       = $file_name->getClientOriginalExtension();
        $fileWithoutExt  = str_replace(".","",basename($original_file_name, $extension));  
        $updated_fileName = $fileWithoutExt."_".rand(0,99).".".$extension; 



             $uploaded = $file_name->move($path, $updated_fileName);

 

               }
                                 
        
                $student = new newes([
                    'title'    =>  $request->get('title'),
                    'desc'     =>  $request->get('desc'),
                    'adby'      =>auth()->guard('admin')->user()->name,
                    'continent'     =>  $request->get('continent'),
                      'file'         =>$uploaded,
                 

                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {

         if(request()->hasFile('documents')) {

          $student = newes::find($request->get('student_id')); 
           

               $image_path =$student->file ;  
   

             if(File::exists($image_path)) {
        File::delete($image_path);
    }
    else
    {
        return 'الفيل مش موجود';
    }
     

                  

        $path = "newes";

        $file_name= request('documents'); 
        $original_file_name = $file_name->getClientOriginalName();

        $extension       = $file_name->getClientOriginalExtension();
        $fileWithoutExt  = str_replace(".","",basename($original_file_name, $extension));  
        $updated_fileName = $fileWithoutExt."_".rand(0,99).".".$extension; 



              $uploaded = $file_name->move($path, $updated_fileName);

 

               }

                 


                $student = newes::find($request->get('student_id'));
                $student->title = $request->get('title');
                $student->desc = $request->get('desc');
                $student->continent = $request->get('continent');
                $student->file =    $uploaded;

                $student->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }

        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function fetchdata(Request $request)
    {
        
        $id = $request->input('id');
        $student = newes::find($id);
        $output = array(
            'title'    =>  $student->title,
            'desc'     =>  $student->desc,
            'adby'     =>  $student->adby,
            'continent'     =>  $student->continent,
              'file'         =>$student->file,
        );
        echo json_encode($output);
    }

    function removedata(Request $request)
    {
        $student = newes::find($request->input('id'));
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }

    function massremove(Request $request)
    {
        $student_id_array = $request->input('id');
        $student = newes::whereIn('id', $student_id_array);
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }
}
