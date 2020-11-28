<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$category_data = Category::all()->toArray();
		return view('category.index', ['category_data' => $category_data]);
	}

	public function category_data()
	{
		$category_data = Category::all()->toArray();
		return Datatables::of($category_data)
		->addColumn('check', function($row){
			$btn = '<input type="checkbox" name="multi_delete[]" class="multi_del" data-id = "'.$row['id'].'">';
			return $btn;
		})
		->addColumn('action', function($row){
			$btn = '<a href="'.url('categories/'. $row['id'].'/edit').'" class="btn btn-info btn-xs">Edit</a>
					<a href="javascript:void(0)" data-toggle="modal" class="btn btn-xs btn-danger delete_single" data-id="'.$row['id'].'">Delete</a>';
			return $btn;
		})
		->rawColumns(['check', 'action'])
		->make(true);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('category.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
		]);

		Category::create($request->all());
		return redirect()->route('categories.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$category = Category::find($id)->toArray();
		return view('category.edit', ['category' => $category]);
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
		$this->validate($request, [
			'name' => 'required',
		]);

		$category = Category::find($id);
		$category->update($request->all());
		return redirect()->route('categories.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request,$id)
	{
		$id = $request->hidden_del;
		Category::destroy($id);
		return redirect()->route('categories.index');
	}

	public function multi_category_delete(Request $request)
	{
		$id = $request->hidden_del;
		$ids = json_decode($id, true);
		Category::destroy($ids);
		/*foreach ($ids as $key => $category_id) {
			$blog = Blog::find($category_id);
			$blog->delete();
		}*/
		return redirect()->route('categories.index');
	}
}
