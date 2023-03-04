<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\Objectivesdatatables;
use App\Objectives;
  use Hash;
  use up;
  use Storage;

class ObjectivessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Objectivesdatatables $dataTable)
    {
         return $dataTable->render('Admin.Objectives.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $Objectives=Objectives::create(['photo'=>'']);
 

             return redirect('admin/Objectives/'.$Objectives->id.'/edit'); 
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
                'Objectives_name_en' => ['required', 'string', 'max:1000'],
                'Objectives_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'Objectives_name_en'=>trans('admin.Objectives_name_en'),
            'Objectives_name_ar'=>trans('admin.Objectives_name_arr'),
         
             
            


            ]);
                   
      

         Objectives::create($data);

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
            $title=trans('admin.Objectives update');
          $Objectives=Objectives::find($id);

       return view('Admin.Objectives.update',compact('title','Objectives'));
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
                

                'Objectives_name_en' => ['required', 'string', 'max:1000'],
                'Objectives_name_ar' => ['required', 'string', 'max:1000'],
             
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'Objectives_name_en'=>trans('admin.Objectives_name_en'),
            'Objectives_name_ar'=>trans('admin.Objectives_name_arr'),
           
             
             'title_name_en'=>trans('admin.title_name_en'),
            'title_name_ar'=>trans('admin.title_name_arr'),
            
             
            


            ]);
                   
      

         Objectives::where('id',$id)->update($data);

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
             $Objectives=Objectives::find($id);
               Storage::delete($Objectives->photo);
         Objectives::find($id)->delete();
           session()->flash('success',trans('admin.deleteObjectives'));
       

         return redirect('admin/Objectives');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $Objectives=Objectives::find($id);
               Storage::delete($Objectives->photo);
                $Objectives->delete(); 
               }
            
          

        }
        else
        {
                    $Objectives=Objectives::find($id);
               Storage::delete($Objectives->photo);
                $Objectives->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/Objectives');

         
    }


      public function update_img_dropzon_Objectives($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "Objectives".$id,

                     ]

                  ); 

                    $settings = Objectives::find($id);  
      Objectives::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_Objectives($id)
               {
                    $Objectives = Objectives::find($id);

                   
                        Storage::delete( $Objectives->photo);
                           $Objectives->photo=null;
                        $Objectives->save();

                        return Response('كلو تمام');

               }
}


