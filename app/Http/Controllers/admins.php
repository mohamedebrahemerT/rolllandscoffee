<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
 
use Illuminate\Http\Request;
  use Hash;
  use carbon\carbon;
  use App\admin;
  use Mail;
  use DB;
  use auth;
  use up;
  use App\Mail\admin_pasword_rest;
  use App\numberAcessWebsite;
  use App\Mail\sendMAilFromAdmin;



  
   
class admins extends Controller
{
     

    public function sendMAil()
    {
            
            $subject=request('subject');
            $email=request('emailto');
          
     Mail::to($email)->send(new sendMAilFromAdmin(['subject'=>$subject]));
            session()->flash('success','mail was send successfully');
     return redirect('admin');
    
    }


  public function register()
  {
    return view('Admin.register');
  }
  public function tt(Request $request)
  {  

 
     $data= $this->validate(request(),[
               'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6'],
                'icon'    => 'sometimes|nullable|' . v_image(),
            
             
            
            ],[],[
          'name'=>'name',
            'email'=>'email',
            'password'=>'password is must more than 6 digit',
          'photo'=>'photo',

            

            ]);

         if (request()->hasFile('photo')) {

                $data['photo']  = up::upload(
                     [
                        "file"=>"photo",
                        "upload_type"=> "single",
                        "delte_file"=> '',
                        "path" => "admin",
                     ]

                      );


          
        }
                  
                  
            
        $data['password']=Hash::make($data['password']);
       
             
         admin::create($data);
       
  
         return redirect('admin_login');

        // return $request->all(); 

    
  }
  

	 public function view_login()
    {
        session()->put('lang','ar');
        return view('Admin.login_from');
    }

    

    public function login()
    {

    
       

        $remeber=Request('Remember')==1? true:false ;
     
  if(auth::guard('admin')->attempt( ['email'=>Request('email'),'password'=>Request('password') ],$remeber) )
     {   
    session()->put('lang','ar');
        

        return redirect ('admin');
     }
     
      
     
  
     else
     {
            session()->flash('danger','invald email or password ');
      return redirect('admin_login');
     }

 
}
                
            public function Admin_logout_fun()
            {
              auth('admin')->logout();
              return redirect('admin_login');

                 //  $this->guard()->logout();
               // Auth::guard()->logout();
                
            }

            public function forgot_password()
            {
                return view('Admin.forgot_pass');
            }

            public function reset_pass(Request $request)
            { 
                if ($admin=admin::where('email',$request->email)->first())
                 {
    session()->put('lang','ar');


                  $token=app('auth.password.broker')->createToken($admin);
                      $data=DB::table('password_resets')->insert([
                         'email'=>$admin->email,
                         'token'=>$token,
                         'created_at'=>Carbon::now(),
                              ]

                      );
              Mail::to($request->email)->send(new admin_pasword_rest(['admin'=>$admin,'token'=>$token]));
                 session()->flash('success','pleaz cheek your acount to rest');
              return redirect('forgot_admin_password');
                      
                 }
                 else
                 {
                       session()->flash('danger','this mail is not valid');
              return redirect('forgot_admin_password');
                  
                 }               
    
            }

                       public function admin_reset_pass_add_new_get ($token)
                       {

                          $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
    if (!empty($check_token)) {
      return view('Admin.admin_reset_pass_add_new', compact('check_token'));
    } else {
      return redirect('forgot_admin_password');
    }
                         

                       }

                       public function admin_reset_pass_add_new_post($token)
                       {

                          
    $this->validate(request(), [
        'password'              => 'required',
       
      ], [], [
        'password'              => 'Password',
      
      ]);

    $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
    if (!empty($check_token)) {
      $admin = Admin::where('email', $check_token->email)->update([
          'email'    => $check_token->email,
          'password' => bcrypt(request('password'))
        ]);
      DB::table('password_resets')->where('email', request('email'))->delete();

      session()->flash('success','password has been modfiy');  
      return redirect('admin_login');
    } else {
      return redirect('forgot_admin_password');
    }
                       }

                
      

         public function getdata(UsersDataTable $dataTable)
{
    return $dataTable->render('Admin.admins.index');
}




}

