<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;
use auth;
  use carbon\carbon;
  use App\admin;
  use Mail;
  use DB;
  use up;
  use App\Mail\Email_verfiy;
  use App\Mail\user_pasword_rest;
  use  App\useruploadpdf;
  use App\numberAcessWebsite;
    
  

  
   

class M_V_L_R extends Controller
{

   



	public function get_register()
	{
		return view('forentend.USERS.M_V_Register');
	}

	public function post_register(Request $request)
	{
    
///return Request();
		     $data=$this->Validate(request(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'level'   =>'required',
              

		     ],[],[
		     'name' =>    'name',
            'email' =>    'email' ,
            'phone' =>    'phone',
            'password' => 'password',
            'level' => 'level',
         



		     ]);



            
		       
                   $data['user_token']=Request('_token');

          
				 $data['password']=Hash::make($data['password']);
                   $data['active']=1;
                   $data['Email_status']=1;
                   $data['surfID']=1;


                  User::create($data);
 

                  session()->flash('success',trans('admin.dataaddsucessfully'));
 
            return redirect('SignIn');



		 
	      
	}


	  public function getverfiy ()
     {
     	return view('forentend.USERS.verify');
     }

     public function postverfiy(Request $request)
     {

     	     if ($user=User::where('code',$request->code)->first() )
     	      {
     	      	$user->active=1;
     	      	$user->code=null;
     	      	$user->save();

            ///////////////////////////////

               $token=app('auth.password.broker')->createToken($user);
                      $data=DB::table('password_resets')->insert([
                         'email'=>$user->email,
                         'token'=>$token,
                         'created_at'=>Carbon::now(),
                              ]

                      );
                      

                      
              Mail::to($user->email)->send(new Email_verfiy(['user'=>$user,'token'=>$token]));
            ///////////////////////////////

            session()->flash('success','please checck your acount to activate');
             
     	       return redirect('M_V_get_Login');

     	      }
     	     else
     	     {
     	        session()->flash('success','code is not correct');
     	          return redirect('verify');

     	     }



     }

         public  function Email_verfiy($token)
               {
                

                 $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
    if (!empty($check_token)) {
      $admin = user::where('email', $check_token->email)->update([
          'Email_status'    =>1,
           
        ]);
      DB::table('password_resets')->where('email',$check_token->email)->delete();
             return redirect('M_V_get_Login');


               }
          }

     public function M_V_get_Login()
     {
     	return view('forentend.USERS.M_V_Login');
     }

     public function M_V_post_Login(Request $request)
            {
            	 $data=$this->Validate(request(),[
             
            'email' => ['required', 'string', 'email', 'max:255',],
            
            'password' => ['required', 'string', 'min:6'],

		     ],[],[
		      
            'email' =>    'email' ,
            'password' => 'password',


		     ]);

            	 

            	if ( $user=User::where('email',$request->email)->first()) 
            	{

                  $password=$user->password;


            		 if ($user->active == 0) 
            	  	{

               $code=rand(1111,9999);

           //   $basic  = new \Nexmo\Client\Credentials\Basic('d19105ae', '9ZbeMsTFn7Few7bB');
             // $client = new \Nexmo\Client($basic);

			//	$message = $client->message()->send([
				//    'to' => '201276708020'/*$data['phone']*/,
				  // 'from' => 'surf',
				   // 'text' => 'your code verfing is '.$code,
			//	]);
         

     	      	$user->code=$code;
     	      	$user->save();

            	  	    $data['email']=$request->email;
                      $data['phone']=$request->phone;
                      $data['code']=$code;
                       session()->flash('success','code send to you sucessfully');
                return view('forentend.USERS.verify',compact('data'));

            	  	}
            	  	else
            	  	{

            	  	      $remeber=Request('Remember')==1? true:false ;

                      
     
            if (auth::guard('cc')->attempt( ['email'=>Request('email'),'password'=>Request('password') ],$remeber) )
                {

            $checck=numberAcessWebsite::orderBy('id','desc')->first();

               
                 if (empty($checck))
                  {
                     $lastDate=date('Y-m-d');
                   }
                   else
                   {
                      $lastDate=$checck->dateCheck;
                   }
              
                 



                    $todaydate =date('Y-m-d');

                 if ($lastDate ==  $todaydate) 
                 {
                     $maxValue=DB::table('numberAcessWebsite')->select('*')->max('numberAcess');
          
              $pulsMAxValue=$maxValue + 1;
              $ldate = date('Y-m-d');
            $numberAcessWebsite = numberAcessWebsite::create([
                    'numberAcess'=>$pulsMAxValue,
                    'dateCheck'=> $ldate,

               ]);

                  session()->flash('success',trans('admin.logsuc'));
             
                           return redirect('Services');
                 }

                 else
                 {
                   $numberAcessWebsite=numberAcessWebsite::get();

                foreach ($numberAcessWebsite as $key )
                 {
                  $key->delete();
                }


                      $maxValue=DB::table('numberAcessWebsite')->select('*')->max('numberAcess');

                      if (empty($maxValue))
                       {
                        $maxValue = 0;
                      }
          
              $pulsMAxValue=$maxValue + 1;
              $ldate = date('Y-m-d');
            $numberAcessWebsite = numberAcessWebsite::create([
                    'numberAcess'=>$pulsMAxValue,
                    'dateCheck'=> $ldate,
                         ]);
                  session()->flash('success',trans('admin.logsuc'));
             
                    return redirect('Services');

                 }
 

  

           
                
                 }
                 else 
                 {
                    session()->flash('danger',trans('admin.invalidpassword'));
              return redirect('SignIn');
                  
                 }     
                     
            	}
            }
            	else
            	{
                session()->flash('danger','this mail is not valid');
              return redirect('SignIn');
                  
            	}
            	 
            	  	
            	
            	  
            	   

            }

            public function V_L_R_home()
            {
            	return view ('M_V_L_R.V_L_R_home');
            }

             public function user_logout_fun()
            {
             // auth('user')->logout();
               Auth::guard('cc')->logout();


                 // $this->guard('web')->logout();
                return redirect('M_V_get_Login');
                              
            }

          public function  request_new_code(Request $request)
               {
                      
                      $email=$request->new_email;
                      $phone=$request->new_phone;
                       if ($user=User::where('email',$request->new_email)->first() )
              {
                $user->code=null;
                $user->save();


            

              }


               $code=rand(1111,9999);
              

            //  $basic  = new \Nexmo\Client\Credentials\Basic('d19105ae', '9ZbeMsTFn7Few7bB');
              //$client = new \Nexmo\Client($basic);

                //$message = $client->message()->send([
                  //  'to' => '201276708020'/*$data['phone']*/,
                    // 'from' => 'surf',
                    //'text' => 'your code verfing is '.$code,
                //]);
            



                 $user->code=$code ;
                $user->save();

                    $email=$request->new_email;
                      $phone=$request->new_phone;

                      $data['email']=$email;
                      $data['phone']=$phone;
                      $data['code']=$code;




                  session()->flash('success','code send to you sucessfully');
              return view('forentend.USERS.verify',compact('data'));


               }


                 public function forgot_password()
            {
                  return view('forentend.USERS.forgot_pass',compact('data'));
                 
            }

            public function reset_pass(Request $request)
            { 
                if ($user=User::where('email',$request->email)->first())
                 {

                  $token=app('auth.password.broker')->createToken($user);
                      $data=DB::table('password_resets')->insert([
                         'email'=>$user->email,
                         'token'=>$token,
                         'created_at'=>Carbon::now(),
                              ]

                      );


              Mail::to($request->email)->send(new user_pasword_rest(['user'=>$user,'token'=>$token]));

              
                 session()->flash('success','pleaz cheek your acount to rest');
                  return view('forentend.USERS.forgot_pass');
            
                      
                 }
                 else
                 {
                       session()->flash('danger','this mail is not valid');
              return redirect('user_forgot_password');
                  
                 }               
    
            }

                       public function user_reset_pass_add_new_get ($token)
                       {
 
                          $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
    if (!empty($check_token)) {
    
           return view('forentend.USERS.user_reset_pass_add_new',compact('check_token'));

    } else {
      return redirect('user_forgot_password');
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
      $admin = user::where('email', $check_token->email)->update([
          'email'    => $check_token->email,
          'password' => bcrypt(request('password'))
        ]);
      DB::table('password_resets')->where('email', request('email'))->delete();

      session()->flash('success','password has been modfiy');  
      return redirect('M_V_get_Login');
    } else {
          session()->flash('danger','this mail is not valid');
      return redirect('user_forgot_password');
    }
                       }


	
    
}
