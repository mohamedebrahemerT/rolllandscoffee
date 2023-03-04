<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\country_state_city;
class DynamicDependent extends Controller
{
 function index()
    {
     $country_list = DB::table('country_state_city')
         ->groupBy('country')
         ->get();
     return view('dynamic_dependent',compact('country_list'));
    }

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('country_state_city')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }

      public function insert(Request $request)
      {




          $validation = Validator::make($request->all(), [
            'country' => 'required',
            'state'  => 'required',
            'city'  => 'required',

            
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
            if($request->get('button_action') == "insert")
            {
                $country_state_city = new country_state_city([
                    'country'    =>  $request->get('country'),
                    'state'     =>  $request->get('state'),
                    'city'     =>  $request->get('city')

                ]);
                $country_state_city->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

           

        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
      }
}
