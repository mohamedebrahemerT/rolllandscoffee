<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
  use App\admin;
use Hash;

class admindata extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index(UsersDataTable $dataTable)
{
    return $dataTable->render('Admin.admins.index');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
          return view('Admin.admins.create');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6'],
             
            
            ],[],[
            'name'=>trans('admin.adminname'),
            'email'=>trans('admin.adminemail'),
            'password'=>trans('admin.adminpassword'),
            
                  


            ]);
                  
                  
            
        $data['password']=Hash::make($data['password']);
       

         admin::create($data);

             session()->flash('success',trans('admin.dataaddsuccessfully'));
       

         return redirect('admin/admins');

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
        $title=trans('admin.update');
        $admin=admin::find($id);

       return view('Admin.admins.update',compact('title','admin'));
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
             
            
            ],[],[
          'name'=>trans('admin.adminname'),
            'email'=>trans('admin.adminemail'),
            'password'=>trans('admin.adminpassword'),
            
                  


            ]);
                  
                  
            
        $data['password']=Hash::make($data['password']);
       

         admin::where('id',$id)->update($data);

             session()->flash('success',trans('admin.dataaupdatedsuccessfully'));
       

         return redirect('admin/admins');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // echo $id;
       admin::find($id)->delete();
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/admins');
    }

     public function  destoryall(Request $request)
    {
        if (is_array(request('item'))) {
            
            admin::destroy(request('item'));

        }
        else
        {
               admin::find(request('item'))->delete();
        }
           session()->flash('success',trans('admin.deleteadminrecored'));
       

         return redirect('admin/admins');

         
    }



}
