<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\userREQUISTdatatables;
  use App\user;
  use App\useruploadpdf;

  use DB;
  use App\Mail\USERSnewPAssworduserNAme;
  use App\Mail\USERSignor;

    
use Mail;

  
  use Hash;

class USERRQUIESTCONTROLLER extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(userREQUISTdatatables $dataTable)
    {
         return $dataTable->render('Admin.userRquiest.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.userRquiest.create');
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
               'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
             'level' => ['required', 'string', 'max:255'],
             
            
            ],[],[
          'name'=>trans('admin.username'),
            'email'=>trans('admin.useremail'),
            'password'=>trans('admin.userpassword'),
            'level'=>trans('admin.level'),

            
                  
           

            ]);
                  
                  
            
        $data['password']=Hash::make($data['password']);
       

         user::create($data);

             session()->flash('success',trans('admin.dataaddsuccessfully'));
       

         return redirect('admin/userRquiest');
        return request();
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
            $title=trans('admin.user');
        $user=user::find($id);

          $useruploadpdf=useruploadpdf::get();
 
            
          $useruploadpdf;


       return view('Admin.userRquiest.update',compact('title','user','useruploadpdf'));
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

              $user=user::find($id);

              $acual_male=$user->email;
              $level=$user->level;


        if (request()->has('approve'))
         {
            
             
             $password    = rand();
             $Sendpass    = $password;
              $surfID      =  DB::table('users')->select('*')->max('surfID');
             if (empty($surfID))
              {
                  $surfID=10000;

             }

             $filnal_code =$surfID + 1;

             if ($level == 'vendor')
              {
                  $email_generat       ='vendor'.$filnal_code.'@surf.com';
              }
              else
              {
                 $email_generat       ='user'.$filnal_code.'@surf.com';
              }

            
             
             $password    =Hash::make($password);

               user::where('id',$id)->update([
                   'email'=>$email_generat,
                     'password' =>$password,
                      'admin_status'=> 1 ,
                        'surfID'=>$filnal_code,


               ]);

                // send mail to with pass= $Sendpass and mail = $email
              
Mail::to($acual_male)->send(new USERSnewPAssworduserNAme(['user'=>$user,'email_generat'=>$email_generat ,'password'=>$Sendpass]));

             session()->flash('success',trans('new member was add '));

               
                   $useruploadpdf=useruploadpdf::where('email',$acual_male)->get();

               foreach ($useruploadpdf as $key )
                {
                  $key->delete();
               }

              

                  return redirect('admin/userRquiest');




        }
        else
        {
            if (request()->has('reason'))
             {
                     $reason=request('reason');
                    if (empty($reason))
                     {
                 $reason='this user is not a vendor cheeck your paper ';
                    }
            }
            
            
                
            

             

    Mail::to($acual_male)->send(new USERSignor( ['user'=>$user,'reason'=>$reason ] ));


       $deleteUserPDF=useruploadpdf::where('email',$acual_male)->get();

              foreach ($deleteUserPDF as $key ) 
              {
                  $key->delete();
              }

           $user->delete();




                session()->flash('success',trans('admin.datarovesuccesfully'));
       

         return redirect('admin/userRquiest');

             


        }
           

       

             session()->flash('success',trans('admin.dataaupdatedsuccessfully'));
       

         return redirect('admin/userRquiest');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         user::find($id)->delete();
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/userRquiest');
    }

       public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) {
            
            user::destroy(request('item'));

        }
        else
        {
               user::find(request('item'))->delete();
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/userRquiest');

         
    }
}
