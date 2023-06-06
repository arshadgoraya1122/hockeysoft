<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
   	
  function __construct()
  {
		 $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
		 $this->middleware('permission:product-create', ['only' => ['create','store']]);
		 $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
		 $this->middleware('permission:product-delete', ['only' => ['destroy']]);
  }
  /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
  public function index()
  {
		$menus = Menu::latest()->paginate(30);
		return view('admin.menu.index',compact('menus'))
			 ->with('i', (request()->input('page', 1) - 1) * 30);
  }
  
  /**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
  public function create()
  {
		return view('admin.menu.create');
  }
  
  /**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
  public function store(Request $request)
  {
		request()->validate([
			 'name' => 'required',
			 'url' => 'required',
		]);
		$data = request()->all();

		Menu::create($data);
  
		return redirect()->route('menus.index')
							 ->with('success','menus created successfully.');
  }
  

  public function edit(Menu $menu)
  {
		return view('admin.menu.edit',compact('menu'));
  }
  
  /**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function update(Request $request, Menu $menu)
  {
		 request()->validate([
			 'name' => 'required',
			 'url' => 'required',
		]);
		$data = request()->all();
		
		$menu->update($data);
  
		return redirect()->route('menus.index')
							 ->with('success','menus updated successfully');
  }
  
  /**
	* Remove the specified resource from storage.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function destroy(Menu $menu)
  {
		$menu->delete();
  
		return redirect()->route('menus.index')
							 ->with('success','Record deleted successfully');
  }
 
}
