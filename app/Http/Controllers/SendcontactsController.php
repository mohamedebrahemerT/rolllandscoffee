<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\Sendcontactdatatables;
use App\Sendcontact;
  use Hash;
  use up;
  use Storage;

class SendcontactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sendcontactdatatables $dataTable)
    {
         return $dataTable->render('Admin.Sendcontact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $Sendcontact=Sendcontact::create(['photo'=>'']);
 

             return redirect('admin/Sendcontact/'.$Sendcontact->id.'/edit'); 
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
                'Sendcontact_name_en' => ['required', 'string', 'max:1000'],
                'Sendcontact_name_es' => ['required', 'string', 'max:1000'],
                'Sendcontact_name_fr' => ['required', 'string', 'max:1000'],
                'Sendcontact_name_it' => ['required', 'string', 'max:1000'],
                'Sendcontact_name_ru' => ['required', 'string', 'max:1000'],
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'Sendcontact_name_en'=>trans('admin.Sendcontact_name_en'),
            'Sendcontact_name_es'=>trans('admin.Sendcontact_name_es'),
            'Sendcontact_name_fr'=>trans('admin.Sendcontact_name_fr'),
            'Sendcontact_name_it'=>trans('admin.Sendcontact_name_it'),
            'Sendcontact_name_ru'=>trans('admin.Sendcontact_name_ru'),
             
            


            ]);
                   
      

         Sendcontact::create($data);

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
            $title=trans('admin.Sendcontact update');
          $Sendcontact=Sendcontact::find($id);

       return view('Admin.Sendcontact.update',compact('title','Sendcontact'));
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
                'title_name_es' => ['required', 'string', 'max:1000'],
                'title_name_fr' => ['required', 'string', 'max:1000'],
                'title_name_it' => ['required', 'string', 'max:1000'],
                'title_name_ru' => ['required', 'string', 'max:1000'],

                'Sendcontact_name_en' => ['required', 'string', 'max:1000'],
                'Sendcontact_name_es' => ['required', 'string', 'max:1000'],
                'Sendcontact_name_fr' => ['required', 'string', 'max:1000'],
                'Sendcontact_name_it' => ['required', 'string', 'max:1000'],
                'Sendcontact_name_ru' => ['required', 'string', 'max:1000'],
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'Sendcontact_name_en'=>trans('admin.Sendcontact_name_en'),
            'Sendcontact_name_es'=>trans('admin.Sendcontact_name_es'),
            'Sendcontact_name_fr'=>trans('admin.Sendcontact_name_fr'),
            'Sendcontact_name_it'=>trans('admin.Sendcontact_name_it'),
            'Sendcontact_name_ru'=>trans('admin.Sendcontact_name_ru'),
             
             'title_name_en'=>trans('admin.title_name_en'),
            'title_name_es'=>trans('admin.title_name_es'),
            'title_name_fr'=>trans('admin.title_name_fr'),
            'title_name_it'=>trans('admin.title_name_it'),
            'title_name_ru'=>trans('admin.title_name_ru'),
             
            


            ]);
                   
      

         Sendcontact::where('id',$id)->update($data);

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
             $Sendcontact=Sendcontact::find($id);
               Storage::delete($Sendcontact->photo);
         Sendcontact::find($id)->delete();
           session()->flash('success',trans('admin.deleteSendcontact'));
       

         return redirect('admin/Sendcontact');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $Sendcontact=Sendcontact::find($id);
               Storage::delete($Sendcontact->photo);
                $Sendcontact->delete(); 
               }
            
          

        }
        else
        {
                    $Sendcontact=Sendcontact::find($id);
               Storage::delete($Sendcontact->photo);
                $Sendcontact->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/Sendcontact');

         
    }


      public function update_img_dropzon_Sendcontact($id)
               {

                if (request()->has('file')) {

                    $data['photo']  = up::upload(
                     [
                        "file"=>"file",
                        "upload_type"=> "single",
                        "delte_file"=> "",
                        "path" => "Sendcontact".$id,

                     ]

                  ); 

                    $settings = Sendcontact::find($id);  
      Sendcontact::where('id', $id)->update($data);

          return $data['photo'];
                    
                }

             
                
               }


               public function delete_img_dropzon_Sendcontact($id)
               {
                    $Sendcontact = Sendcontact::find($id);

                   
                        Storage::delete( $Sendcontact->photo);
                           $Sendcontact->photo=null;
                        $Sendcontact->save();

                        return Response('كلو تمام');

               }
}


