<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsesOfPipesdatatables;
use App\UsesOfPipes;
  use Hash;
  use up;
  use Storage;

class UsesOfPipessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsesOfPipesdatatables $dataTable)
    {
         return $dataTable->render('Admin.UsesOfPipes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $UsesOfPipes=UsesOfPipes::create(['photo'=>'']);
 

             return redirect('admin/UsesOfPipes/'.$UsesOfPipes->id.'/edit'); 
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
                'UsesOfPipes_name_en' => ['required', 'string', 'max:1000'],
                'UsesOfPipes_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'UsesOfPipes_name_en'=>trans('admin.UsesOfPipes_name_en'),
            'UsesOfPipes_name_ar'=>trans('admin.UsesOfPipes_name_arr'),
         
             
            


            ]);
                   
      

         UsesOfPipes::create($data);

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
            $title=trans('admin.UsesOfPipes update');
          $UsesOfPipes=UsesOfPipes::find($id);

       return view('Admin.UsesOfPipes.update',compact('title','UsesOfPipes'));
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
                

                'UsesOfPipes_name_en' => ['required', 'string', 'max:1000'],
                'UsesOfPipes_name_ar' => ['required', 'string', 'max:1000'],
             
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'UsesOfPipes_name_en'=>trans('admin.UsesOfPipes_name_en'),
            'UsesOfPipes_name_ar'=>trans('admin.UsesOfPipes_name_arr'),
           
             
             'title_name_en'=>trans('admin.title_name_en'),
            'title_name_ar'=>trans('admin.title_name_arr'),
            
             
            


            ]);
                   
      

         UsesOfPipes::where('id',$id)->update($data);

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
             $UsesOfPipes=UsesOfPipes::find($id);
               Storage::delete($UsesOfPipes->photo);
         UsesOfPipes::find($id)->delete();
           session()->flash('success',trans('admin.deleteUsesOfPipes'));
       

         return redirect('admin/UsesOfPipes');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $UsesOfPipes=UsesOfPipes::find($id);
               Storage::delete($UsesOfPipes->photo);
                $UsesOfPipes->delete(); 
               }
            
          

        }
        else
        {
                    $UsesOfPipes=UsesOfPipes::find($id);
               Storage::delete($UsesOfPipes->photo);
                $UsesOfPipes->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/UsesOfPipes');

         
    }


      public function update_img_dropzon_UsesOfPipes($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "UsesOfPipes".$id,

                     ]

                  ); 

                    $settings = UsesOfPipes::find($id);  
      UsesOfPipes::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_UsesOfPipes($id)
               {
                    $UsesOfPipes = UsesOfPipes::find($id);

                   
                        Storage::delete( $UsesOfPipes->photo);
                           $UsesOfPipes->photo=null;
                        $UsesOfPipes->save();

                        return Response('كلو تمام');

               }
}


