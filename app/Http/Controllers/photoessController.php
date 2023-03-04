<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\DataTables\photoesdatatables;

use App\photoes;

use App\Maincategories;



  use Hash;

  use up;

  use Storage;



class photoessController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(photoesdatatables $dataTable)

    {

         return $dataTable->render('Admin.photoes.index');

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

         $photoes=photoes::create(['photo'=>'']);

 



             return redirect('admin/photoes/'.$photoes->id.'/edit'); 

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

                'photoes_name_en' => ['required', 'string', 'max:1000'],

                'photoes_name_ar' => ['required', 'string', 'max:1000'],

               

            

            ],[],[

            'photoes_name_en'=>trans('admin.photoes_name_en'),

            'photoes_name_ar'=>trans('admin.photoes_name_arr'),

         

             

            





            ]);

                   

      



         photoes::create($data);



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

            $title=trans('admin.photoes update');

          $photoes=photoes::find($id);



       return view('Admin.photoes.update',compact('title','photoes'));

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

 

                'yearPrize' => ['required', 'string', 'max:1000'],
 

            ],[],[

            'yearPrize'=>trans('admin.yearPrize'),
 



            ]);

                  
 

         photoes::where('id',$id)->update($data);



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

             $photoes=photoes::find($id);

               Storage::delete($photoes->photo);

         photoes::find($id)->delete();

           session()->flash('success',trans('admin.deletephotoes'));

       



         return redirect('admin/photoes');

    }



       public function  destoryall(Request $request)

    {

        if (is_array(request('item'))) 

        {

               foreach (request('item') as $id  ) 

               {



                     $photoes=photoes::find($id);

               Storage::delete($photoes->photo);

                $photoes->delete(); 

               }

            

          



        }

        else

        {

                    $photoes=photoes::find($id);

               Storage::delete($photoes->photo);

                $photoes->delete(); 

        

        }

           session()->flash('success',trans('admin.deleteadminrecored'));

       



         return redirect('admin/photoes');



         

    }





      public function update_img_dropzon_photoes($id)

               {



                if (request()->has('file')) {



                    $data['photo']  = up::upload(

                     [

                        "file"=>"file",

                        "upload_type"=> "single",

                        "delte_file"=> "",

                        "path" => "photoes".$id,



                     ]



                  ); 



                    $settings = photoes::find($id);  

      photoes::where('id', $id)->update($data);



          return $data['photo'];

                    

                }



             

                

               }





               public function delete_img_dropzon_photoes($id)

               {

                    $photoes = photoes::find($id);



                   

                        Storage::delete( $photoes->photo);

                           $photoes->photo=null;

                        $photoes->save();



                        return Response('كلو تمام');



               }

}





