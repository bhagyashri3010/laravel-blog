<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cms;
use App\Model\Blog;

class FrontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('is_published',1)->get();
        return view('front_end.index',['blogs' => $blogs]);
    }
}
