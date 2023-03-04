<?php

 namespace App\Http\Controllers;

 use Illuminate\Http\Request;

 use Validator,Redirect,Response,File;

 use Socialite;

 use App\User;

 use Hash;

 class SocialController extends Controller

 {

 public function redirect($provider)

 {

     return Socialite::driver($provider)->redirect();

 }

 public function callback($provider)

 {

   $getInfo = Socialite::driver($provider)->user(); 

   $user = $this->createUser($getInfo,$provider); 

   auth()->login($user); 

            session()->flash('success',trans('admin.dataCretedsucsufully'));


 

return redirect('http://ac4mt.org/Oscar/Actualvote/singleVoteAfterBack/'.session('subcategories_id').'/'.session('singleVote_id'));

   

 }

 function createUser($getInfo,$provider){

 $user = User::where('provider_id', $getInfo->id)->first();


  

 if (!$user) {

      $user = User::create([

         'name'     => $getInfo->name,

         'email'    => $getInfo->email,

         'provider' => $provider,

         'provider_id' => $getInfo->id,

              'password'    => $data['password']=Hash::make(123456789),

 'level' =>'user',

         'active' =>1,

         'Email_status' =>1,

         'surfID' =>1,

         'admin_status'=>1,

         

     ]);

   }

   return $user;

 }

 }