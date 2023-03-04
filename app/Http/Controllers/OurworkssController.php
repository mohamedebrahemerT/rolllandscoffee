<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\Ourworksdatatables;
use App\Ourworks;
  use Hash;
  use up;
  use Storage;

class OurworkssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ourworksdatatables $dataTable)
    {
         return $dataTable->render('Admin.Ourworks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $Ourworks=Ourworks::create(['photo'=>'']);
 

             return redirect('admin/Ourworks/'.$Ourworks->id.'/edit'); 
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
                'Ourworks_name_en' => ['required', 'string', 'max:1000'],
                'Ourworks_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'Ourworks_name_en'=>trans('admin.Ourworks_name_en'),
            'Ourworks_name_ar'=>trans('admin.Ourworks_name_arr'),
         
             
            


            ]);
                   
      

         Ourworks::create($data);

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
            $title=trans('admin.Ourworks update');
          $Ourworks=Ourworks::find($id);

       return view('Admin.Ourworks.update',compact('title','Ourworks'));
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
                

                'Ourworks_name_en' => ['required', 'string', 'max:1000'],
                'Ourworks_name_ar' => ['required', 'string', 'max:1000'],
             
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'Ourworks_name_en'=>trans('admin.Ourworks_name_en'),
            'Ourworks_name_ar'=>trans('admin.Ourworks_name_arr'),
           
             
             'title_name_en'=>trans('admin.title_name_en'),
            'title_name_ar'=>trans('admin.title_name_arr'),
            
             
            


            ]);
                   
      

         Ourworks::where('id',$id)->update($data);

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
             $Ourworks=Ourworks::find($id);
               Storage::delete($Ourworks->photo);
         Ourworks::find($id)->delete();
           session()->flash('success',trans('admin.deleteOurworks'));
       

         return redirect('admin/Ourworks');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $Ourworks=Ourworks::find($id);
               Storage::delete($Ourworks->photo);
                $Ourworks->delete(); 
               }
            
          

        }
        else
        {
                    $Ourworks=Ourworks::find($id);
               Storage::delete($Ourworks->photo);
                $Ourworks->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/Ourworks');

         
    }


      public function update_img_dropzon_Ourworks($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "Ourworks".$id,

                     ]

                  ); 

                    $settings = Ourworks::find($id);  
      Ourworks::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_Ourworks($id)
               {
                    $Ourworks = Ourworks::find($id);

                   
                        Storage::delete( $Ourworks->photo);
                           $Ourworks->photo=null;
                        $Ourworks->save();

                        return Response('كلو تمام');

               }
}


