<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function index()
    {
        $categories=Category::all();
        return view('photos.create',['category'=>$categories]);
       
       
    }
   
}
