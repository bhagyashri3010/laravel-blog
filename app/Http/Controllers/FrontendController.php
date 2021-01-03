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
        $categories = config('app.category');
        return view('front_end.index',['blogs' => $blogs,'categories' => $categories]);
    }

    public function about_us()
    {
        $view = Cms::where('cms_type','about_us')->first();
        $categories = config('app.category');
        $blogs = Blog::where('is_published',1)->get();
        return view('front_end.about_us',['blogs' => $blogs,'view' => $view,'categories' => $categories]);
    }
    public function category_listing($id)
    {
        $blogs = Blog::where('is_published',1)->where('category_id',$id)->get();
        $categories = config('app.category');
        return view('front_end.category_blog',['blogs' => $blogs,'categories' => $categories]);
    }
}
