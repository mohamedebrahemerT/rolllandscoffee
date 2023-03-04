<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\VisionMissiondatatables;
use App\VisionMission;
  use Hash;
  use up;
  use Storage;

class VisionMissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VisionMissiondatatables $dataTable)
    {
         return $dataTable->render('Admin.VisionMission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $VisionMission=VisionMission::create(['photo'=>'']);
 

             return redirect('admin/VisionMission/'.$VisionMission->id.'/edit'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
              

          $data= $this->validate(request(),[   

                'title_name_en' => ['required', 'string', 'max:1000'],
                'title_name_ar' => ['required', 'string', 'max:1000'],
              
                'VisionMission_name_en' => ['required', 'string', 'max:1000'],
                'VisionMission_name_ar' => ['required', 'string', 'max:1000'],
             
            
            ],[],[
            'VisionMission_name_en'=>trans('admin.VisionMission_name_en'),
            'VisionMission_name_ar'=>trans('admin.VisionMission_name_arr'),
          

             'title_name_en'=>trans('admin.title_name_en'),
            'title_name_ar'=>trans('admin.title_name_arr'),
           
             
            


            ]);
                   
      

         VisionMission::create($data);

                return Response(['status'=>true,'message'=>trans('admin.dataaddsuccessfully'),'data'=>$data],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $title=trans('admin.VisionMission update');
          $VisionMission=VisionMission::find($id);

       return view('Admin.VisionMission.update',compact('title','VisionMission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $data= $this->validate(request(),[   

                'title_name_en' => ['required', 'string', 'max:1000'],
                'title_name_ar' => ['required', 'string', 'max:1000'],
              
                'VisionMission_name_en' => ['required', 'string', 'max:1000'],
                'VisionMission_name_ar' => ['required', 'string', 'max:1000'],
             
            
            ],[],[
            'VisionMission_name_en'=>trans('admin.VisionMission_name_en'),
            'VisionMission_name_ar'=>trans('admin.VisionMission_name_arr'),
          

             'title_name_en'=>trans('admin.title_name_en'),
            'title_name_ar'=>trans('admin.title_name_arr'),
           
             
            


            ]); 
                   
      

         VisionMission::where('id',$id)->update($data);

                return Response(['status'=>true,'message'=>trans('admin.dataaupdatedsuccessfully'),'data'=>$data],200);

  
 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             $VisionMission=VisionMission::find($id);
               Storage::delete($VisionMission->photo);
         VisionMission::find($id)->delete();
           session()->flash('success',trans('admin.deleteVisionMission'));
       

         return redirect('admin/VisionMission');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $VisionMission=VisionMission::find($id);
               Storage::delete($VisionMission->photo);
                $VisionMission->delete(); 
               }
            
          

        }
        else
        {
                    $VisionMission=VisionMission::find($id);
               Storage::delete($VisionMission->photo);
                $VisionMission->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/VisionMission');

         
    }


      public function update_img_dropzon_VisionMission($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "VisionMission".$id,

                     ]

                  ); 

                    $settings = VisionMission::find($id);  
      VisionMission::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_VisionMission($id)
               {
                    $VisionMission = VisionMission::find($id);

                   
                        Storage::delete( $VisionMission->photo);
                           $VisionMission->photo=null;
                        $VisionMission->save();

                        return Response('كلو تمام');

               }
}


