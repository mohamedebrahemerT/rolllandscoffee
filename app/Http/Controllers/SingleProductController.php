<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Orders;
use App\filess;
use App\newes;





class SingleProductController extends Controller
{
    
          function index($id)

             {
                   $products=product::where('id',$id)->get();

               	   $PP=product::where('id',$id)->first();

                $stockLevel = getStockLevel($PP->stock);
            

             	   $filess=filess::where('relation_id',$id)->get();
             	   foreach ($products as $product) 
             	   {
             	    $related_product=$product->department_id;
             	   }

         $related_producttts=product::where('department_id',$related_product)->get();
             	         
                  	foreach ($products as $product)
                  	 {
                  	     if ($product->department_id == '')
                  	      {
                  	       	$cheeck='';
                  	         	
                  	       }
                  	       else
                  	       {
                  	       	    	$cheeck='true';
                  	       }

                               if (auth()->guard('cc')->user())
                    {
                   $idd=auth()->guard('cc')->user()->id ;
                   }
                   else
                   {
                    $idd=0;

                   }

                               $Orders=Orders::where('user_id',$idd )->get();
                     $Total_order=0;
                     $order_count=0;
                    foreach($Orders as $ors)
                    {  

                    foreach($ors->order_idc()->get()  as $or)
                        {
                        $Total_order=$Total_order + $or->Total ;
                        $order_count=$order_count + 1;
                        }                                            
                        }
                  	 }

                     $newes=newes::orderBy('id','desc')->get();
                     $productes=product::orderBy('id', 'desc')->take(4)->get();



          return view('forentend.singleProduct.singleProduct',compact('products','cheeck','filess','related_producttts','Total_order','order_count','newes','productes','stockLevel'));
             }




           


              function singleproduct_sreach($id)

             {
                 $products=product::where('id',$id)->get();
                 $filess=filess::where('relation_id',$id)->get();
                 foreach ($products as $product) 
                 {
                  $related_product=$product->department_id;
                 }

         $related_producttts=product::where('department_id',$related_product)->get();
                       
                    foreach ($products as $product)
                     {
                         if ($product->department_id == '')
                          {
                            $cheeck='';
                              
                           }
                           else
                           {
                                  $cheeck='true';
                           }

                               if (auth()->guard('cc')->user())
                    {
                   $idd=auth()->guard('cc')->user()->id ;
                   }
                   else
                   {
                    $idd=0;

                   }

                               $Orders=Orders::where('user_id',$idd )->get();
                     $Total_order=0;
                     $order_count=0;
                    foreach($Orders as $ors)
                    {  

                    foreach($ors->order_idc()->get()  as $or)
                        {
                        $Total_order=$Total_order + $or->Total ;
                        $order_count=$order_count + 1;
                        }                                            
                        }
                     }

                     $newes=newes::orderBy('id','desc')->get();
                     $productes=product::orderBy('id', 'desc')->take(4)->get();

          return view('forentend.singleproduct_sreach.singleproduct_sreach',compact('products','cheeck','filess','related_producttts','Total_order','order_count','newes','productes'));
             }




}
