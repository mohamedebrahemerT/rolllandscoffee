<?php

namespace App\Http\Controllers;



use App\DataTables\productesDatatable;

use App\Http\Controllers\Controller;

use App\product;

use Illuminate\Http\Request;

use Storage;

use up;

use App\filess;

use App\sizes;

use App\weight;

use App\otherData;

 





class productesController extends Controller

{

   /**

    * Display a listing of the resource.

    *

    * @return \Illuminate\Http\Response

    */

   public function index(productesDatatable $trade)

   {

      

      return $trade->render('Admin.productes.index', ['title' => trans('admin.productes')]);

   }



   /**

    * Show the form for creating a new resource.

    *

    * @return \Illuminate\Http\Response

    */

   public function create()

   {

          $productes=product::create(['title_name_ar'=>'']);

 



             return redirect('admin/productes/'.$productes->id.'/edit');   

           

     // return view('admin.productes.create', ['title' => trans('admin.add')]);

   }



   /**

    * Store a newly created resource in storage.

    *

    * @param  \Illuminate\Http\Request  $request

    * @return \Illuminate\Http\Response

    */

   public function store()

   {



     return 'test test';

      $data = $this->validate(request(),

         [

            'title' => 'required',

            



         ], [], [

            'title' => trans('admin.title'),

           

         ]);



      product::create($data);

      session()->flash('success', trans('admin.record_added'));

      return redirect('admin/productes');

   }



   /**

    * Display the specified resource.

    *

    * @param  int  $id

    * @return \Illuminate\Http\Response

    */

   public function show($id)

   {

      //

   }



   /**

    * Show the form for editing the specified resource.

    *

    * @param  int  $id

    * @return \Illuminate\Http\Response

    */

   public function edit($id)

   {



   

      $productes = product::find($id);

          

    return view('Admin.productes.create',['productes'=>$productes]);

     

   }



   /**

    * Update the specified resource in storage.

    *

    * @param  \Illuminate\Http\Request  $request

    * @param  int  $id

    * @return \Illuminate\Http\Response



    */





       public function DELET_PRODUCT ($id)

          {

               



                  $DELET_PRODUCT=product::where('id',$id);

             $DELET_PRODUCT->delete();



              return Response(['status'=>true,'message'=>trans('admin.datadeleted'),'DELET_PRODUCT'=>$DELET_PRODUCT],200);



               

            }



   public function update_img_dropzon_product($id,request $request)

               {



                


 if (request()->has('file')) 
                {



            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('/images/products'), $imageName);
          
         

         $data['photo']  =    'images/products/'.$imageName;; 

                    $settings = product::find($id);  
      product::where('id', $id)->update($data);

          return $data['photo'];
                    
                }
             

                

               }



               public function delete_img_dropzon_product($id)

               {

                    $productes = product::find($id);



                   

                        Storage::delete( $productes->photo);

                           $productes->photo=null;

                        $productes->save();



                        return Response('كلو تمام');



               }

   



   public function upload_img($id)

   {



           if (request()->has('file'))

            {

               $file     =request()->file('file');

               $size     =$file->getSize();

               $mum_type =$file->getMimeType();

               $name     =$file->getClientOriginalName();

               $hashName =$file->hashName();



                 $file->store("productes".$id);



              



                   $add=filess::create([

                'name'        => $name,

                'size'        => $size ,

                'file'        => $hashName ,

                'path'        => 'productes'.$id ,

                'full_file'   => 'productes'.$id.'/'.$hashName ,

                'mum_type'    => $mum_type,

                'file_type'   => 'productes', 

                'relation_id' => $id,



               ]);



              $fid=$add->id;

              return 'hotel tamam';



            return Response(['status'=>true,'id'=>$fid],200);



          }

      

   }



   public function delete_img()

            {

           

             if (request()->has('id')) 

             {

              // return  up::delete_image(request('id'));

              $fid=request('id');

               $file=filess::find($fid);

                       if (!empty($file)) 

                       {

                          Storage::delete($file->full_file);

                        $file->delete();

  

                       }

             }



             return Response(['status'=>true,'id'=>$fid],200);



            }



               public function load_dep_v_size_weight()

            {



              if (request()->ajax() && request()->has('id') )

               {

               $id=request('id');



              // return get_parent($id);

               $array1=explode(',',get_parent($id));

               

                       $r=[$id];

              // return $array1;

              $Dip_list=array_diff($array1,$r);



          $sizes=sizes::where('is_public','yes')

          ->whereIn('department_id',$Dip_list)

          ->orWhere('department_id',$id)

          ->pluck('name_'.session('lang'),'id');





        //  $size_2=sizes::;

          // $sizes=array_merge(json_decode($size_1,true) ,json_decode($size_2,true));

    

            $weight=weight::pluck('name_'.session('lang'),'id');

    return view('admin.productes.ajax',[

        'sizes'=>$sizes,

        'weight'=>$weight,

         'productcc'=>product::find(request('product_id'))

         ])->render();





   

                //$id=request('id');

                 //return '<h1>'.$id.'</h1>';

              }

              

            }



   public function update($id)

   {     







             

         $productes = product::find($id);   



           

      

    $data = $this->validate(request(),

           [

              'title_name_ar'          => 'required',

              'content_name_ar'        => 'sometimes|nullable|',

               'title_name_en'          => 'required',

              'content_name_en'        =>'sometimes|nullable|',

               

 

              'calories'          => 'required|numeric',
              'price'          => 'required|numeric',

              'start_at'       => 'sometimes|nullable|',

              'end_at'         => 'sometimes|nullable|',

              'start_offer_at' => 'sometimes|nullable|date',

              'end_offer_at'   => 'sometimes|nullable|date',

              'price_offer'    =>'sometimes|nullable|numeric',

             

              'status'         =>'sometimes|nullable|in:pending,refused,active',

              'reason'         =>'sometimes|nullable', 

              'department_id'=>'required|numeric',

          

         ], [], [



              'title'           =>  trans('admin.title'),

              'content'         =>  trans('admin.content'),

             

             

              'price'           =>  trans('admin.price'),

              'stock'           =>  trans('admin.stock'),

              'start_at'        =>  trans('admin.start_at'),

              'end_at'          =>  trans('admin.end_at'),

              'start_offer_at'  =>  trans('admin.start_offer_at'),

              'end_offer_at'    =>  trans('admin.end_offer_at'),

              'price_offer'     =>  trans('admin.price_offer'),

          

         

              'status'          =>  trans('admin.status'),

              'reason'          =>  trans('admin.reason'),

              'department_id'          =>  trans('admin.department_id'),

              

            



         ]);

 if (request()->has('input_key') && request()->has('input_value')) 

               {



            $i=0;



             $c=otherData::where('product_id',$id);

             $c->delete();



        foreach (request('input_key') as $input_key )

                 {  

                      $input_value=request('input_value')[$i];

          otherData::create([

                'product_id'  =>$id,

                'input_key'   =>$input_key,

                'input_value' =>$input_value,



                     ]);

                   

                }





                 /*  $other_dataa='';

                   $other_dataa2='';

                   $i=0;

                foreach (request('input_key') as $key) {

                  $other_dataa .=$key;

                  $i++;



                }



                foreach (request('input_value') as $v) {

                  $other_dataa2 .=$v;

                  



                }

                

                $result = $other_dataa2 . ' ' . $other_dataa;



                 $data['other_data']=$result;



                 */

               }

              

             

      product::where('id', $id)->update($data);

     

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

      $productes = product::find($id);

      $productes->delete();

      session()->flash('success', trans('admin.datadeleted'));

      return redirect('admin/productes');

   }



   public function multi_delete()

   {

      if (is_array(request('item'))) {

         foreach (request('item') as $id) {

            $malls = product::find($id);

            $malls->delete();

         }

      } else {

         $malls = product::find(request('item'));

         $malls->delete();

      }

      session()->flash('success', trans('admin.datadeleted'));

      return redirect('admin/productes');

       

   }


       public function arrange()

    {


          $posts = product::orderBy('order','ASC')->get();

         return view ('Admin.productes.arrange',compact('posts'));

    }

    public function updatepost(Request $request)

    {

        $posts = product::all();


        foreach ($posts as $post) {

            foreach ($request->order as $order) 
            {



                if ($order['id'] == $post->id) {

                    $post->update(['order' => $order['position']]);

                }

            }

        }

        

        return response('Update Successfully.', 200);

    }

}

