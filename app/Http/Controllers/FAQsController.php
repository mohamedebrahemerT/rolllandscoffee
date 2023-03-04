<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\FAQsdatatables;
use App\FAQs;
  use Hash;
  use up;
  use Storage;

class FAQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FAQsdatatables $dataTable)
    {
         return $dataTable->render('Admin.FAQs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $FAQs=FAQs::create(['photo'=>'']);
 

             return redirect('admin/FAQs/'.$FAQs->id.'/edit'); 
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
                'FAQs_name_en' => ['required', 'string', 'max:1000'],
                'FAQs_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'FAQs_name_en'=>trans('admin.FAQs_name_en'),
            'FAQs_name_ar'=>trans('admin.FAQs_name_arr'),
         
             
            


            ]);
                   
      

         FAQs::create($data);

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
            $title=trans('admin.FAQs update');
          $FAQs=FAQs::find($id);

       return view('Admin.FAQs.update',compact('title','FAQs'));
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
                

                'FAQs_name_en' => ['required', 'string', 'max:1000'],
                'FAQs_name_ar' => ['required', 'string', 'max:1000'],
             
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'FAQs_name_en'=>trans('admin.FAQs_name_en'),
            'FAQs_name_ar'=>trans('admin.FAQs_name_arr'),
           
             
             'title_name_en'=>trans('admin.title_name_en'),
            'title_name_ar'=>trans('admin.title_name_arr'),
            
             
            


            ]);
                   
      

         FAQs::where('id',$id)->update($data);

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
             $FAQs=FAQs::find($id);
               Storage::delete($FAQs->photo);
         FAQs::find($id)->delete();
           session()->flash('success',trans('admin.deleteFAQs'));
       

         return redirect('admin/FAQs');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $FAQs=FAQs::find($id);
               Storage::delete($FAQs->photo);
                $FAQs->delete(); 
               }
            
          

        }
        else
        {
                    $FAQs=FAQs::find($id);
               Storage::delete($FAQs->photo);
                $FAQs->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/FAQs');

         
    }


      public function update_img_dropzon_FAQs($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "FAQs".$id,

                     ]

                  ); 

                    $settings = FAQs::find($id);  
      FAQs::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_FAQs($id)
               {
                    $FAQs = FAQs::find($id);

                   
                        Storage::delete( $FAQs->photo);
                           $FAQs->photo=null;
                        $FAQs->save();

                        return Response('كلو تمام');

               }
}


