<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;



use App\Department;

use Illuminate\Http\Request;

use Storage;

 

    use up;







class DepartmentsController extends Controller {

	/**

	 * Display a listing of the resource.

	 *

	 * @return \Illuminate\Http\Response

	 */

	public function index() {

		return view('Admin.departments.index', ['title' => trans('admin.departments')]);

	}



	/**

	 * Show the form for creating a new resource.

	 *

	 * @return \Illuminate\Http\Response

	 */

	public function create() {

		return view('Admin.departments.create', ['title' => trans('admin.add')]);

	}



	/**

	 * Store a newly created resource in storage.

	 *

	 * @param  \Illuminate\Http\Request  $request

	 * @return \Illuminate\Http\Response

	 */

	public function store() {



		$data = $this->validate(request(),

			[

				'dep_name_ar' => 'required',

				'dep_name_en' => 'required',

				'parent'      => 'sometimes|nullable|numeric',

				'icon'        => 'sometimes|nullable|required| image|mimes:jpg,png,gif,jpeg|max:2048',

				'description' => 'sometimes|nullable',

				'keyword'     => 'sometimes|nullable', 

				'indecator'     => 'sometimes|nullable',



			], [], [

				'dep_name_ar' => trans('admin.dep_name_ar'),

				'dep_name_en' => trans('admin.dep_name_en'),

				'parent'      => trans('admin.parent'),

				'icon'        => trans('admin.icon'),

				'description' => trans('admin.description'),

				'keyword'     => trans('admin.keyword'), 

				'indecator'     => trans('admin.indecator'),

			]);



		if (request()->hasFile('icon')) {





                  $data['icon']  = up::upload(

                     [

                        "file"=>"icon",

                        "upload_type"=> "single",

                        "delte_file"=>'',

                        "path" => "departments",



                        



                     ]



                  ); 



		 

		}



		if (request()->hasFile('icon2')) {





                  $data['icon2']  = up::upload(

                     [

                        "file"=>"icon2",

                        "upload_type"=> "single",

                        "delte_file"=>'',

                        "path" => "departments",



                        



                     ]



                  ); 



		 

		}



		



		Department::create($data);

		session()->flash('success', trans('admin.record_added'));

		return redirect('admin/departments');

	}



	/**

	 * Display the specified resource.

	 *

	 * @param  int  $id

	 * @return \Illuminate\Http\Response

	 */

	public function show($id) {

		//

	}



	/**

	 * Show the form for editing the specified resource.

	 *

	 * @param  int  $id

	 * @return \Illuminate\Http\Response

	 */

	public function edit($id) {

		$department = Department::find($id);

		$title      = trans('admin.edit');

		return view('Admin.departments.edit', compact('department', 'title'));

	}



	/**

	 * Update the specified resource in storage.

	 *

	 * @param  \Illuminate\Http\Request  $request

	 * @param  int  $id

	 * @return \Illuminate\Http\Response

	 */

	public function update(Request $r, $id) {







		$data = $this->validate(request(),

			[

				'dep_name_ar' => 'required',

				'dep_name_en' => 'required',

				'parent'      => 'sometimes|nullable|numeric',

				'icon'        => 'sometimes|nullable',

				'description' => 'sometimes|nullable',

				'keyword'     => 'sometimes|nullable',

				'indecator'     => 'sometimes|nullable',



			], [], [

				'dep_name_ar' => trans('admin.dep_name_ar'),

				'dep_name_en' => trans('admin.dep_name_en'),

				'parent'      => trans('admin.parent'),

				'icon'        => trans('admin.icon'),

				'description' => trans('admin.description'),

				'keyword'     => trans('admin.keyword'),

				'indecator'     => trans('admin.indecator'),

				

			]);



		if (request()->hasFile('icon')) {

                  $data['icon']  = up::upload(

                     [

                        "file"=>"icon",

                        "upload_type"=> "single",

                        "delte_file"=>'',

                        "path" => "departments",

                     ]

                  ); 

		}





			if (request()->hasFile('icon2')) {





                  $data['icon2']  = up::upload(

                     [

                        "file"=>"icon2",

                        "upload_type"=> "single",

                        "delte_file"=>'',

                        "path" => "departments",



                        



                     ]



                  ); 



		 

		}



		Department::where('id', $id)->update($data);

		session()->flash('success', trans('admin.updated_record'));

		return redirect('admin/departments');

	}



	/**

	 * Remove the specified resource from storage.

	 *

	 * @param  int  $id

	 * @return \Illuminate\Http\Response

	 */

	public static function delete_parent($id) {

		$department_parent = Department::where('parent', $id)->get();

		foreach ($department_parent as $sub) {

			self::delete_parent($sub->id);

			if (!empty($sub->icon)) {

				Storage::has($sub->icon)?Storage::delete($sub->icon):'';

			}

			$subdepartment = Department::find($sub->id);

			if (!empty($subdepartment)) {

				$subdepartment->delete();

			}

		}

		$dep = Department::find($id);



		if (!empty($dep->icon)) {

			Storage::has($dep->icon)?Storage::delete($dep->icon):'';

		}

		$dep = Department::find($id);

		

		$dep->delete();

	}

	public function destroy($id) {

		self::delete_parent($id);

		session()->flash('success', trans('admin.deleted_record'));

		return redirect('admin/departments');

	}

	         public function arrange()

    {

 

             $posts = Department::orderBy('order','ASC')->get();

         return view ('Admin.departments.arrange',compact('posts'));

    }

    public function updatepost(Request $request)

    {

        $posts = Department::all();


        foreach ($posts as $post) {

            foreach ($request->order as $order) 
            {



                if ($order['id'] == $post->id) 
                {

                    $post->update(['order' => $order['position']]);

                }

            }

              
            

        }

        

        return response('Update Successfully.', 200);

    }


}