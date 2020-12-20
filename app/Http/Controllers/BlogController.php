<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Blog;
use App\Model\Category;
use Image,File;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
	public function __construct()
	{

	}

	public function index()
	{
        $blog_data = Blog::with('category')->orderBy('id','desc')->get()->toArray();
		return view('blogs.index', ['blog_data' => $blog_data]);
	}

	public function blog_data()
	{
		// Databale for Blog
		$Blogs = Blog::with('category')->orderBy('id','desc')->get()->toArray();
		return Datatables::of($Blogs)
		// ->addIndexColumn()
		->addColumn('check', function($row){
			$btn = '<input type="checkbox" name="multi_delete[]" class="multi_del" data-id ="'.$row["id"].'">';
			return $btn;
		})
		->addColumn('publish', function($row){
			if ($row['is_published'] == 1) {
				$btn = "<a href='javascript:void(0)' id='blog-publish' data-id=".$row['id'] ."
					data-publish=0> <i class='fa fa-check'></i> </a>";
			}
			else{
				$btn = "<a href='javascript:void(0)' id='blog-publish' data-id=".$row['id'] ."
					data-publish=1> <i class='fa fa-times'></i> </a>";
			}
			return $btn;
		})
		->addColumn('action', function($row){
			$btn = "<a href=".url('show-blog/'.$row['id'])." data-id=".$row['id'] ." class='btn btn-info btn-xs'>Edit</a>
			<a href='#delete_blog_popup' data-toggle='modal' class='btn btn-xs btn-danger delete_single' data-id=".$row["id"].">Delete</a>";
			return $btn;
		})
		->rawColumns(['action','category','check','publish'])
		->make(true);

	}

	public function show_create()
	{
		$categories = Category::all()->toArray();
		return view('blogs.add', ['categories' => $categories]);
	}

	public function blog_create(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
			'description' => 'required'
		]);

		$path = public_path('uploads/blog_image/');
		$file = $request->file('image');
		$filename = saveImage($file,$path);
		$blog_data = [];
		$blog_data['title'] = $request->title;
		$blog_data['description'] = $request->description;
		$blog_data['category_id'] = $request->category_id;
		$blog_data['image'] = $filename;
		$blog_data['is_published'] = $request->is_published;
		$blog_data['created_by'] = 1;

		Blog::create($blog_data);
		return redirect()->route('blogs');
	}

	public function show_edit($id)
	{
		$blog = Blog::find($id);
		$categories = Category::all()->toArray();
		return view('blogs.edit', ['categories' => $categories,'blog'=>$blog]);
	}

	public function blog_edit(Request $request,$id)
	{
		$this->validate($request, [
			'title' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
			'description' => 'required'
		]);

		$blog_data = [];
		if($request->image){
			$path = public_path('uploads/blog_image/');
			$file = $request->file('image');
			$filename = saveImage($file,$path);
			$blog_data['image'] = $filename;
		}
		$blog=Blog::find($id);
		$blog_data['title'] = $request->title;
		$blog_data['description'] = $request->description;
		$blog_data['category_id'] = $request->category_id;
		$blog_data['is_published'] = $request->is_published;
		$blog_data['created_by'] = 1;
		$blog->update($blog_data);
		return redirect()->route('blogs');

		//return redirect()->route('blog.index'); -> what is blog.index #askrahul
	}

	public function blog_delete(Request $request){
		$id = $request->hidden_del;

		$blog = Blog::find($id);
		$imagePath =public_path().'/uploads/blog_image/'.$blog->image;
		File::delete($imagePath);
		$blog->delete();
		return redirect()->route('blogs');
	}
	public function multi_blog_delete(Request $request)
	{
		$id = $request->hidden_del;
		$ids = json_decode($id, true);
		foreach ($ids as $key => $blog_id) {
			$blog = Blog::find($blog_id);
			$imagePath =public_path().'/uploads/blog_image/'.$blog->image;
			File::delete($imagePath);
			$blog->delete();
		}
		return redirect()->route('blogs');
	}

	public function change_publish(Request $request){
		// dd($request->all());
		$blog = Blog::find($request->publish_id);
		$blog->is_published = (int) $request->publish_value;
		$blog->update();
		return redirect()->route('blogs');
	}
}
