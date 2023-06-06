<?php

namespace App\Http\Controllers;

use App\Models\FooterServiceCategory;
use Illuminate\Http\Request;

class FooterServiceCategoryController extends Controller
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
		$footer = FooterServiceCategory::latest()->paginate(5);
		return view('admin.footer.index',compact('footer'))
			 ->with('i', (request()->input('page', 1) - 1) * 5);
  }
  
  /**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
  public function create()
  {
		return view('admin.footer.create');
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
		]);
		$data = request()->all();

		FooterServiceCategory::create($data);
  
		return redirect()->route('footerlinkcategory.index')
							 ->with('success','footerlinkcategory created successfully.');
  }
  
  /**
	* Display the specified resource.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
 //  public function show(Product $product)
 //  {
 //      return view('products.show',compact('product'));
 //  }
  
  /**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function edit($id)
  {	

		$footer = FooterServiceCategory::where('id',$id)->first();
		return view('admin.footer.edit',compact('footer'));
  }
  
  /**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function update(Request $request)
  {
		 request()->validate([
			 'name' => 'required',
		]);
		$footer = FooterServiceCategory::where('id',request('id'))->first();
		$data = request()->all();
		
		$footer->update($data);
  
		return redirect()->route('footerlinkcategory.index')
							 ->with('success','footerlinkcategory updated successfully');
  }
  
  /**
	* Remove the specified resource from storage.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function destroy($id)
  {
		$footer = FooterServiceCategory::where('id',$id)->first();
		$footer->delete();
  
		return redirect()->route('footerlinkcategory.index')
							 ->with('success','Record deleted successfully');
  }

}
