<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ourTeamdatatables;
use App\ourTeam;
  use Hash;
  use up;
  use Storage;

class ourTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ourTeamdatatables $dataTable)
    {
         return $dataTable->render('Admin.ourTeam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $ourTeam=ourTeam::create(['photo'=>'']);
 

             return redirect('admin/ourTeam/'.$ourTeam->id.'/edit'); 
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
                'ourTeam_name_en' => ['required', 'string', 'max:1000'],
                'ourTeam_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'ourTeam_name_en'=>trans('admin.ourTeam_name_en'),
            'ourTeam_name_ar'=>trans('admin.ourTeam_name_arr'),
         
             
            


            ]);
                   
      

         ourTeam::create($data);

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
            $title=trans('admin.ourTeam update');
          $ourTeam=ourTeam::find($id);

       return view('Admin.ourTeam.update',compact('title','ourTeam'));
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

               'jobTitle_name_en' => ['required', 'string', 'max:1000'],
                'jobTitle_name_ar' => ['required', 'string', 'max:1000'],
                

                'name_name_en' => ['required', 'string', 'max:1000'],
                'name_name_ar' => ['required', 'string', 'max:1000'],

                'desc_name_en' => ['required', 'string', 'max:1000'],
                'desc_name_ar' => ['required', 'string', 'max:1000'],


             
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'jobTitle_name_en'=>trans('admin.jobTitle_name_en'),
            'jobTitle_name_ar'=>trans('admin.jobTitle_name_ar'),

             'name_name_en'=>trans('admin.name_name_en'),
            'name_name_ar'=>trans('admin.name_name_ar'),
           
             
             'desc_name_en'=>trans('admin.desc_name_en'),
            'desc_name_ar'=>trans('admin.desc_name_ar'),
            
             
            


            ]);
                   
      

         ourTeam::where('id',$id)->update($data);

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
             $ourTeam=ourTeam::find($id);
               Storage::delete($ourTeam->photo);
         ourTeam::find($id)->delete();
           session()->flash('success',trans('admin.deleteourTeam'));
       

         return redirect('admin/ourTeam');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $ourTeam=ourTeam::find($id);
               Storage::delete($ourTeam->photo);
                $ourTeam->delete(); 
               }
            
          

        }
        else
        {
                    $ourTeam=ourTeam::find($id);
               Storage::delete($ourTeam->photo);
                $ourTeam->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/ourTeam');

         
    }


      public function update_img_dropzon_ourTeam($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "ourTeam".$id,

                     ]

                  ); 

                    $settings = ourTeam::find($id);  
      ourTeam::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_ourTeam($id)
               {
                    $ourTeam = ourTeam::find($id);

                   
                        Storage::delete( $ourTeam->photo);
                           $ourTeam->photo=null;
                        $ourTeam->save();

                        return Response('كلو تمام');

               }
}


