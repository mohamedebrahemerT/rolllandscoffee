<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\customersdatatables;
use App\customers;
  use Hash;
  use up;
  use Storage;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(customersdatatables $dataTable)
    {
         return $dataTable->render('Admin.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $customers=customers::create(['photo'=>'']);
 

             return redirect('admin/customers/'.$customers->id.'/edit'); 
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
                'customers_name_en' => ['required', 'string', 'max:1000'],
                'customers_name_ar' => ['required', 'string', 'max:1000'],
               
            
            ],[],[
            'customers_name_en'=>trans('admin.customers_name_en'),
            'customers_name_ar'=>trans('admin.customers_name_arr'),
         
             
            


            ]);
                   
      

         customers::create($data);

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
            $title=trans('admin.customers update');
          $customers=customers::find($id);

       return view('Admin.customers.update',compact('title','customers'));
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
           
                

                'customers_name_en' => ['required', 'string', 'max:1000'],
           
             
                 'photo' => 'image|mimes:jpg,png,gif,jpeg',     
            
            ],[],[
            'customers_name_en'=>trans('admin.customers_name_en'),
     
           
             
             'title_name_en'=>trans('admin.title_name_en'),
      
            
             
            


            ]);
                   
      

         customers::where('id',$id)->update($data);

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
             $customers=customers::find($id);
               Storage::delete($customers->photo);
         customers::find($id)->delete();
           session()->flash('success',trans('admin.deletecustomers'));
       

         return redirect('admin/customers');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) 
        {
               foreach (request('item') as $id  ) 
               {

                     $customers=customers::find($id);
               Storage::delete($customers->photo);
                $customers->delete(); 
               }
            
          

        }
        else
        {
                    $customers=customers::find($id);
               Storage::delete($customers->photo);
                $customers->delete(); 
        
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/customers');

         
    }


      public function update_img_dropzon_customers($id,Request $request)
               {

                
                   if (request()->hasFile('file')) 
    {

        $imageName = time().'.'.$request->file->extension();  
      $data['photo']= time().'.'.$request->file->extension();  

   

           $request->file->move(public_path('images'), $imageName);

}    

                    $settings = customers::find($id);  
      customers::where('id', $id)->update($data);

          return $data['photo'];
                    
              

             
                
               }


               public function delete_img_dropzon_customers($id)
               {
                    $customers = customers::find($id);

                   
                        Storage::delete( $customers->photo);
                           $customers->photo=null;
                        $customers->save();

                        return Response('كلو تمام');

               }
}


