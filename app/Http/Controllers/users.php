<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\userssssdatatables;
  use App\user;
  use Hash;

class users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(userssssdatatables $dataTable)
    {
         return $dataTable->render('Admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.users.create');
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
       

         return redirect('admin/users');
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

       return view('Admin.users.update',compact('title','user'));
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
               'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,'.$id,],
            'password' => ['required', 'string', 'min:6'],
            'level' => ['required', 'string', 'max:255'],
             
            
            ],[],[
          'name'=>trans('admin.adminname'),
            'email'=>trans('admin.adminemail'),
            'password'=>trans('admin.adminpassword'),
             'level'=>trans('admin.level')
        ]);
            
                  


           
                  
                  
            
        $data['password']=Hash::make($data['password']);
       

         user::where('id',$id)->update($data);

             session()->flash('success',trans('admin.dataaupdatedsuccessfully'));
       

         return redirect('admin/users');
        
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
       

         return redirect('admin/users');
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
       

         return redirect('admin/users');

         
    }
}
