<?php

namespace App\Http\Controllers;

use App\Models\BannerSection;
use Illuminate\Http\Request;

class BannerSectionController extends Controller
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
		$banner = BannerSection::latest()->paginate(5);
		return view('admin.banner.index',compact('banner'))
			 ->with('i', (request()->input('page', 1) - 1) * 5);
  }
  
  /**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
  public function create()
  {
		return view('admin.banner.create');
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
			 'heading' => 'required',
			 'image' => 'required',
		]);
		$data = request()->all();
		 if($request->file('image')){
			 $file= $request->file('image');
			 $path = 'images/front/';
			 $filename = date('YmdHi').$file->getClientOriginalName();
			 $file-> move(public_path($path), $filename);
			 $data['image'] = $path.''.$filename;
		}

		BannerSection::create($data);
  
		return redirect()->route('banner.index')
							 ->with('success','Banner created successfully.');
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
  public function edit(BannerSection $banner)
  {
		return view('admin.banner.edit',compact('banner'));
  }
  
  /**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function update(Request $request, BannerSection $banner)
  {
		 request()->validate([
			 'heading' => 'required',
		]);
		$data = request()->all();
		if($request->file('image')){
		 $file= $request->file('image');
		 $path = 'images/front/';
		 $filename = date('YmdHi').$file->getClientOriginalName();
		 $file-> move(public_path($path), $filename);
		 $data['image'] = $path.''.$filename;
	}
		
		$banner->update($data);
  
		return redirect()->route('banner.index')
							 ->with('success','banner updated successfully');
  }
  
  /**
	* Remove the specified resource from storage.
	*
	* @param  \App\Product  $product
	* @return \Illuminate\Http\Response
	*/
  public function destroy(BannerSection $banner)
  {
		$banner->delete();
  
		return redirect()->route('banner.index')
							 ->with('success','Record deleted successfully');
  }
}
