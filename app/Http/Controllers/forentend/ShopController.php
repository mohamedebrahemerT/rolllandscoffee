<?php



namespace App\Http\Controllers\forentend;

use App\Http\Controllers\Controller;

 



use App\product;

use App\Category;

use App\Department;

use App\filess;

        use DB;



use Illuminate\Http\Request;



class ShopController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    { 









      if (request()->id) 

      {



         $id=Request('id');



            

      $products = product::where('department_id',

              $id)->inrandomOrder()->paginate(6);



      if (session('lang')=='ar') {

          $categoryName =Department::where('id',$id)->first()->dep_name_ar;

          $Department =Department::where('id',$id)->first();



   $Departments = DB::table('departments')

            ->whereNull('parent')->inrandomOrder()->take(8)->get();



            

      $FeaturedProducts = product::inrandomOrder()->take(4)->get();

    



        return view('forentend.shop.shop')->with([

            'products' => $products,

            'Departments' => $Departments,

            'categoryName'=>$categoryName,

            'Department'=>$Department,

            'FeaturedProducts'=>$FeaturedProducts

          

        ]);



       

      }

      elseif (session('lang')=='en') {

          $categoryName =Department::where('id',$id)->first()->dep_name_en;

          $Department =Department::where('id',$id)->first();



   $Departments = DB::table('departments')

            ->whereNull('parent')->inrandomOrder()->take(8)->get();



      $FeaturedProducts = product::inrandomOrder()->take(4)->get();



        return view('forentend.shop.shop_en')->with([

            'products' => $products,

            'Departments' => $Departments,

            'categoryName'=>$categoryName,

            'Department'=>$Department,

            'FeaturedProducts'=>$FeaturedProducts

          

        ]);

       

      }

           



            

        } else {



             $products = product::inrandomOrder()->paginate(9);

            $categoryName = trans('admin.allcat');

             $Departments = DB::table('departments')

            ->whereNull('parent')->inrandomOrder()->take(8)->get();

      $FeaturedProducts = product::inrandomOrder()->take(4)->get();

     

 $Department='';



        if (session('lang')  =='ar')

         {

          return view('forentend.shop.shop')->with([

            'products' => $products,

            'Departments' => $Departments,
            'Department' => $Department,

            'categoryName'=>$categoryName,

            'FeaturedProducts'=>$FeaturedProducts

             ]);

        }


 
       



        }

           

     

        

  

        



         

 

         

    }



    /**

     * Display the specified resource.

     *

     * @param  string  $slug

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {



     

     

          $product = product::where('id', $id)->firstOrFail();

          $department_id=$product->department_id;

 $department=department::where('id',$department_id)->first();

           

     $mightAlsoLike = product::where('department_id',$department_id)->inRandomOrder()->paginate(4);







                 $filess=filess::where('relation_id',$id)->get();





        return view('forentend.product.product')->with([

            'product' => $product,

            'mightAlsoLike'=>$mightAlsoLike,

            'department'=>$department,

            'filess'=>$filess,

        ]);

    }



    public function search(Request $request)

    { 

            $request->validate([

            'query' => 'required|min:3',

        ]);



        $query = $request->input('query');



         $products = product::where('name', 'like', "%$query%")

                            ->orWhere('details', 'like', "%$query%")

                            ->orWhere('description', 'like', "%$query%")

                            ->paginate(10);



        //$products = Product::search($query)->paginate(10);



        return view('search-results')->with('products', $products);

    }



    public function searchAlgolia(Request $request)

    {

        

    }

}

