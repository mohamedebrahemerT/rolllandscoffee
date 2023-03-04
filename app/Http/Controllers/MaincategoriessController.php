<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\Maincategoriesdatatables;
use App\Maincategories;
  use Hash;
  use up;
  use Storage;

class MaincategoriessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Maincategoriesdatatables $dataTable)
    {
         return $dataTable->render('Admin.Maincategories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $Maincategories=Maincategories::create(['photo'=>'']);
 

             return redirect('admin/Maincategories/'.$Maincategories->id.'/edit'); 
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
                'Maincategories_name_en' => ['required', 'string', 'max:1000'],
                'Maincategories_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'Maincategories_name_en'=>trans('admin.Maincategories_name_en'),
            'Maincategories_name_ar'=>trans('admin.Maincategories_name_arr'),
         
             
            


            ]);
                   
      

         Maincategories::create($data);

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
            $title=trans('admin.Maincategories update');
          $Maincategories=Maincategories::find($id);

       return view('Admin.Maincategories.update',compact('title','Maincategories'));
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

           
                

                'Maincategories_name_en' => ['required', 'string', 'max:1000'],
                'Maincategories_name_ar' => ['required', 'string', 'max:1000'],
             
                 
            
            ],[],[
            'Maincategories_name_en'=>trans('admin.Maincategories_name_en'),
            'Maincategories_name_ar'=>trans('admin.Maincategories_name_arr'),
           
             
      
            
             
            


            ]);
                   
      

         Maincategories::where('id',$id)->update($data);

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
             $Maincategories=Maincategories::find($id);
               Storage::delete($Maincategories->photo);
         Maincategories::find($id)->delete();
           session()->flash('success',trans('admin.deleteMaincategories'));
       

         return redirect('admin/Maincategories');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $Maincategories=Maincategories::find($id);
               Storage::delete($Maincategories->photo);
                $Maincategories->delete(); 
               }
            
          

        }
        else
        {
                    $Maincategories=Maincategories::find($id);
               Storage::delete($Maincategories->photo);
                $Maincategories->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/Maincategories');

         
    }


      public function update_img_dropzon_Maincategories($id,request $request)
               {

                if (request()->has('file')) 
                {



            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('/images/Maincategories'), $imageName);
          
         

         $data['photo']  =    'images/Maincategories/'.$imageName;; 

                    $settings = Maincategories::find($id);  
      Maincategories::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_Maincategories($id)
               {
                    $Maincategories = Maincategories::find($id);

                   
                        Storage::delete( $Maincategories->photo);
                           $Maincategories->photo=null;
                        $Maincategories->save();

                        return Response('كلو تمام');

               }
}


