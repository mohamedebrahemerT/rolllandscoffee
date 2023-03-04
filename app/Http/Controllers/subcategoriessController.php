<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\subcategoriesdatatables;
use App\subcategories;
use App\Maincategories;

  use Hash;
  use up;
  use Storage;

class subcategoriessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(subcategoriesdatatables $dataTable)
    {
         return $dataTable->render('Admin.subcategories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $subcategories=subcategories::create(['photo'=>'']);
 

             return redirect('admin/subcategories/'.$subcategories->id.'/edit'); 
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
                'subcategories_name_en' => ['required', 'string', 'max:1000'],
                'subcategories_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'subcategories_name_en'=>trans('admin.subcategories_name_en'),
            'subcategories_name_ar'=>trans('admin.subcategories_name_arr'),
         
             
            


            ]);
                   
      

         subcategories::create($data);

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
            $title=trans('admin.subcategories update');
          $subcategories=subcategories::find($id);

       return view('Admin.subcategories.update',compact('title','subcategories'));
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

            

                

                'subcategories_name_en' => ['required', 'string', 'max:1000'],
                'subcategories_name_ar' => ['required', 'string', 'max:1000'],
                'measure_name_en' => ['required', 'string', 'max:1000'],
                'measure_name_ar' => ['required', 'string', 'max:1000'],
                'Maincategories_id' => 'required' ,
             
                 
            
            ],[],[
            'subcategories_name_en'=>trans('admin.subcategories_name_en'),
            'subcategories_name_ar'=>trans('admin.subcategories_name_arr'),
            'measure_name_en'=>trans('admin.measure_name_en'),
            'measure_name_ar'=>trans('admin.measure_name_ar'),
            'Maincategories_id'=>trans('admin.Maincategories_id'),
           
             
      
            
             
            


            ]);
                  $Maincategories_id=request('Maincategories_id');

          $Maincategories=Maincategories::where('id',$Maincategories_id)->first();

                $data['Maincategories_name_ar']=$Maincategories->Maincategories_name_ar;
                $data['Maincategories_name_en']=$Maincategories->Maincategories_name_en;

         subcategories::where('id',$id)->update($data);

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
             $subcategories=subcategories::find($id);
               Storage::delete($subcategories->photo);
         subcategories::find($id)->delete();
           session()->flash('success',trans('admin.deletesubcategories'));
       

         return redirect('admin/subcategories');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $subcategories=subcategories::find($id);
               Storage::delete($subcategories->photo);
                $subcategories->delete(); 
               }
            
          

        }
        else
        {
                    $subcategories=subcategories::find($id);
               Storage::delete($subcategories->photo);
                $subcategories->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/subcategories');

         
    }


      public function update_img_dropzon_subcategories($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "subcategories".$id,

                     ]

                  ); 

                    $settings = subcategories::find($id);  
      subcategories::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_subcategories($id)
               {
                    $subcategories = subcategories::find($id);

                   
                        Storage::delete( $subcategories->photo);
                           $subcategories->photo=null;
                        $subcategories->save();

                        return Response('كلو تمام');

               }
}


