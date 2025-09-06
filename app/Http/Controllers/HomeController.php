<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    //
   public function home()
{
    $blogs = Blog::latest()->take(3)->get(); 
    return view('home', compact('blogs'));
}

    public function about()
    {
        return view('about');
    }
}