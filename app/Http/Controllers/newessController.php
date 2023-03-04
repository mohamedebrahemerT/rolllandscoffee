<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\newesdatatables;
use App\newes;
  use Hash;
  use up;
  use Storage;

class newessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(newesdatatables $dataTable)
    {
         return $dataTable->render('Admin.newes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $newes=newes::create(['photo'=>'']);
 

             return redirect('admin/newes/'.$newes->id.'/edit'); 
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
                'newes_name_en' => ['required', 'string', 'max:1000'],
                'newes_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'newes_name_en'=>trans('admin.newes_name_en'),
            'newes_name_ar'=>trans('admin.newes_name_arr'),
         
             
            


            ]);
                   
      

         newes::create($data);

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
            $title=trans('admin.newes update');
          $newes=newes::find($id);

       return view('Admin.newes.update',compact('title','newes'));
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
                

                'newes_name_en' => ['required', 'string', 'max:1000'],
                'newes_name_ar' => ['required', 'string', 'max:1000'],
             
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'newes_name_en'=>trans('admin.newes_name_en'),
            'newes_name_ar'=>trans('admin.newes_name_arr'),
           
             
             'title_name_en'=>trans('admin.title_name_en'),
            'title_name_ar'=>trans('admin.title_name_arr'),
            
             
            


            ]);
                   
      

         newes::where('id',$id)->update($data);

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
             $newes=newes::find($id);
               Storage::delete($newes->photo);
         newes::find($id)->delete();
           session()->flash('success',trans('admin.deletenewes'));
       

         return redirect('admin/newes');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $newes=newes::find($id);
               Storage::delete($newes->photo);
                $newes->delete(); 
               }
            
          

        }
        else
        {
                    $newes=newes::find($id);
               Storage::delete($newes->photo);
                $newes->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/newes');

         
    }


      public function update_img_dropzon_newes($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "newes".$id,

                     ]

                  ); 

                    $settings = newes::find($id);  
      newes::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_newes($id)
               {
                    $newes = newes::find($id);

                   
                        Storage::delete( $newes->photo);
                           $newes->photo=null;
                        $newes->save();

                        return Response('كلو تمام');

               }
}


