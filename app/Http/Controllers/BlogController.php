<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\newes;

class BlogController extends Controller
{
    public function Blog()
    {
    	   $newess= newes::paginate(3);
                   $randomNewess= newes::inrandomOrder()->take(3)->get();
                   $randomNewess1= newes::inrandomOrder()->take(1)->get();
    	return view('forentend.Blog.Blog',compact('newess','randomNewess','randomNewess1'));
    }
}
